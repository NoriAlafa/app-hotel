<?php

namespace App\Controllers;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct(){
        helper('url');
        $this->userModel = new \App\Models\UserModel();
        
    }

    public function index()
    {
        $data['judul'] = "REGISTER";
        return view('auth/register' , $data);
    }

    public function login()
    {
        if(session('id')){
            return redirect()->to('/dashboard');
        }

        $data['judul'] = "LOGIN";
        return view('auth/login' , $data);
    }

    public function register() {
        //untuk validasi
        $validasi = $this->validate([
            'nama'=>[
                //jika username sudah ada di table dan harus diisi
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'min_length' => 'Nama kurang lebih memiliki panjang 4 karakter'
                ]
            ],
            'email' =>[
                'rules' =>'required|is_unique[tb_user.email]|valid_email',
                'errors'=>[
                    'required'  =>'Email Harus Diisi',
                    'is_unique' =>'Email sudah dipakai user lain',
                    'valid_email'=>'Email tidak valid'
                ]
            ],
            'nik'  =>[
                'rules' =>'required|min_length[16]|integer',
                'errors'=>[
                    'required' => 'NIK tidak boleh kosong',
                    'min_length'=> 'Perhatikan panjang NIK Anda',
                    'integer'   => 'Oops NIK anda Illegal'
                ]
            ],
            'password' => [
                //password harus diisi dan minimal 4 karakter
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
            'password_new' => [
                //password keduanya harus sama
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sama'
                ]
            ],
            'gambar'    =>[
                'rules' =>'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'uploaded'=>'Gambar Kosong',
                    'max_size'=>'Ukuran Gambar Tidak Boleh Melebihi 1MB',
                    'is_image'=>'Yang Anda Pilih Bukan Gambar',
                    'mime_in' =>'Yang Anda Pilih Bukan Gambar'
                ]
            ],
        ]);

        //jika data tidak sesuai kembali dan munculkan pesan error di form register.
        if(!$validasi){
            return redirect()->back()->withInput();
        }
        $gambar = $this->request->getFile('gambar');
        // $gambar->move('images/');
        if ($gambar->isValid() && ! $gambar->hasMoved()) {
            $fileGambar = $gambar->getName();
            $gambar->move('images/profile/' , $fileGambar);
        }
        //Jika data sesuai lakukan penyimpanan data
        $data=[
            'nama'      => $this->request->getPost('nama'),
            'email'     => $this->request->getPost('email'),
            'nik'       => $this->request->getPost('nik'),
            //enkripsi password dengan bycript
            'password'  => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT),
            'role_id'   =>1,
            'gambar'    =>$fileGambar          
        ];

        //memasukan data dalam database
        $this->userModel->insert($data);
        //jika berhasil arahkan ke tampilan login
        return redirect()->to('/login');
    }

    public function cek_login() {
        //ambil data dari form
        $username = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        //cari data dari tabel admin sesuai username
        $dataUser=$this->userModel->where('email',$username)->first();
    
        // jika ada
        if($dataUser) {
            //jika password sesuai
            if(password_verify($password,$dataUser['password'])) {
                //masukan session untuk username dan status login
                session()->set([
                    'id'        =>$dataUser['id_user'],
                    'email'     => $username,
                    'role_id'   => $dataUser['role_id'],
                    'logged_in' =>true
                ]);
                if(session('role_id') ==2 OR session('role_id') ==3 ){
                    session()->setFlashdata('success',"Berhasil Login");
                    return redirect()->to('/dashboard');
                }else{
                    return redirect()->to('/laman_depan');
                }
            }
            
            else { 
                //jika salah
                //kembali ke login dan berikan pesan error
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->back()->withInput();
            }
        }else{
            session()->setFlashdata('error', 'Email tidak ditemukan');
            return redirect()->back()->withInput();
        } 
        
    }

    public function logout() {
        //hapus session
        session()->destroy();
        return redirect()->to('/login');
    }
    
}
