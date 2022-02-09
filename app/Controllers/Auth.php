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
        $data['judul'] = "Register";
        return view('auth/register' , $data);
    }

    public function login()
    {
        $data['judul'] = "Login";
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
                'rules' =>'required|max_length[16]|integer',
                'errors'=>[
                    'required' => 'NIK tidak boleh kosong',
                    'max_length'=> 'Perhatikan panjang NIK Anda',
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
            ]
        ]);

        //jika data tidak sesuai kembali dan munculkan pesan error di form register.
        if(!$validasi){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        //Jika data sesuai lakukan penyimpanan data
        $data=[
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'nik' => $this->request->getPost('nik'),
            //enkripsi password dengan bycript
            'password' => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT)           
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
                'email' => $username,
                'logged_in' =>true
                ]);

                return redirect()->to('/dashboard');
            }
            
            else { 
                //jika salah
                //kembali ke login dan berikan pesan error
                session()->setFlashdata('error', 'Email & Password Salah');
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
