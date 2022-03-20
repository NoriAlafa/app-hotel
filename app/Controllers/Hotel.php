<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KamarModel;
use App\Models\ReservationModel;
use CodeIgniter\Pager\PagerRenderer;

class Hotel extends BaseController
{

    public function __construct(){
        helper('url');
        $this->userModel    = new UserModel();
        $this->kamarModel   = new KamarModel();
        $this->resepModel   = new ReservationModel();
    }

    public function lamanDepan()
    {
        $data = [
            'profileCount'  => $this->userModel->where('role_id' , 1)->countAllResults(),
            'kamarCount'    => $this->kamarModel->get()->resultID->num_rows,
            'adminCount'    => $this->userModel->where('role_id' , 2)->countAllResults(),
            'resepCount'    => $this->userModel->where('role_id' , 3)->countAllResults(),
        ];
        return view('user/laman_depan' , $data);
    }

    public function lamanKamar($id)
    {
        $data['judul']      ='Kamar';
        $data['viewKamar']  =$this->kamarModel->viewFasilitas($id);
        return view('user/room_detail' , $data);
    }

    public function hotelKamar(){
        $keyword            = $this->request->getGet('keyword');
        $data['judul']      = 'Kamar';
        $data['kamar']      = $this->kamarModel->findAll();
        $data               = $this->kamarModel->getPaginate(9 , $keyword);
        return view('user/room' , $data);
    }

    public function kontak()
    {
        return view('user/contact');
    }

   

    public function profile()
    {
        $id = session('id');
        $data['profile'] =$this->userModel->user($id);
        return view('user/profile/profile' ,$data);
    }

    public function bayar(){
        if(!session('id')){
            return redirect()->to('/login');
        }
        $user = session('id');
        $check_in = strtotime($this->request->getPost('tgl_check_in'));
        $check_out = strtotime($this->request->getPost('tgl_check_out'));
        $perMalam = abs($check_out - $check_in)/(60*1440);
        $harga_kamar = $this->request->getPost('harga_kamar');
        $bayarMalamSesTamu = $this->request->getPost('jumlah_tamu');
        //harga kamar dikali harga sewa permalam dan di kali jumlah tamu
        $bayarMalam = $perMalam * $harga_kamar * $bayarMalamSesTamu;

        
        
        $data = [
            'id_reservasion'            =>$this->request->getPost('id_reservation'),
            'id_kamar'                  =>$this->request->getPost('id_kamar'),
            'id_user'                   =>$user,
            'nama'                      =>$this->request->getPost('nama'),
            'tgl_check_in'              =>$this->request->getPost('tgl_check_in'),
            'tgl_check_out'             =>$this->request->getPost('tgl_check_out'),
            'jumlah_tamu'               =>$bayarMalamSesTamu,
            'pembayaran'                =>$bayarMalam,
            'harga_kamar'               =>$harga_kamar,
            'status_rev'                =>'booking'
        ];
        $this->resepModel->insert($data);
        session()->setFlashdata('user' , 'Kamar Berhasil Dipesan');
        return redirect()->back();
    }

    public function profileEdit($id){
        $data['profile'] = $this->userModel->where('id_user',$id)->findAll();
        return view('user/profile/profile_update',$data);
    }

    public function profileUpdate(){
        $validate = $this->validate([
            'nama'  =>[
                'rules' =>'required|min_length[4]',
                'errors'=>[
                    'required'      =>'Nama Tidak Boleh Kosong',
                    'min_length'    =>'Nama Tidak Boleh Kurang Dari 4'
                ],
            ],
            'nik'   =>[
                'rules'=>'required|min_length[16]|integer',
                'errors'=>[
                    'required'      =>'NIK Tidak Bolehh Kosong',
                    'min_length'    =>'Perhatikan Panjang NIK Anda',
                    'integer'       =>'NIK tidak boleh berisi huruf'
                ],
            ],
            'email' =>[
                'rules'=>'required|valid_email',
                'errors'=>[
                    'required'      =>'Email Harus Diisi',
                    'valid_email'   =>'Email Tidak Valid'
                ],
            ],
            'password'=>[
                'rules'=>'required|min_length[8]',
                'errors'=>[
                    'required'      =>'Password Harus Diisi',
                    'min_length'    =>'Password Minimal 8 karakter'
                ],
            ],
            'gambar'    =>[
                'rules' =>'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size'=>'Ukuran Gambar Tidak Boleh Melebihi 1MB',
                    'is_image'=>'Yang Anda Pilih Bukan Gambar',
                    'mime_in' =>'Yang Anda Pilih Bukan Gambar'
                ]
            ],
        ]);

        if(!$validate){
            return redirect()->back()->withInput();
        }
        $id = session('id');
        $gambar = $this->request->getFile('gambar');
        $pindah = $this->userModel->find($id);
        if ($gambar->isValid() && ! $gambar->hasMoved()) {
            if(file_exists('images/profile/'.$pindah['gambar'])){
                unlink('images/profile/' . $pindah['gambar']);
            }
            $fileGambar = $gambar->getName();
            $gambar->move('images/profile/' , $fileGambar);
        }

        $data = [
            'nama'      => $this->request->getPost('nama'),
            'nik'       => $this->request->getPost('nik'),
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT),
            'bio'       => $this->request->getPost('bio'),
            'gambar'    =>$fileGambar
        ];
        $this->userModel->update($id,$data);
        return redirect()->to('/profile');
    }

    public function profilePesanan($id){
        $data['pesanKamar'] = $this->resepModel->getByUser($id);
        return view('user/profile/pesanan_saya' , $data);
    }
    
}
