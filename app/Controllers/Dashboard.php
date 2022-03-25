<?php

namespace App\Controllers;

use App\Models\KamarModel;
use App\Models\UserModel;
use App\Models\ReservationModel;

class Dashboard extends BaseController
{
    public function __construct(){
        helper('url');
        $this->kamarModel       = new KamarModel(); 
        $this->userModel        = new UserModel(); 
        $this->resepModel       = new ReservationModel();

    }

    public function index()
    {
        
        if(session('role_id') == 1){
            return redirect()->to('/');
        }

        $id = session('id');
        $chart              = $this->resepModel->chart();
        $Barchart           = $this->resepModel->Barchart();
        $User               = $this->userModel->user($id);
        $dataAllKamar       = $this->kamarModel->get()->resultID->num_rows;
        $dataStatusAda      = $this->kamarModel->where('status_kamar' , 'Tersedia')->countAllResults();
        $dataStatusTdk      = $this->kamarModel->where('status_kamar' , 'Kosong')->countAllResults();
        $dataPending        = $this->resepModel->where('status_rev' , 'booking')->countAllResults();
        $dataBayar          = $this->resepModel->where('status_rev' , 'bayar')->countAllResults();
        $dataOut            = $this->resepModel->where('status_rev' , 'out')->countAllResults();
        $dataAllUser        = $this->userModel->where('role_id' , 1)->countAllResults();
        $data = [
            'User'              => $User,
            'barchart'          =>$Barchart,
            'dataChart'         =>$chart,
            'viewKamar'         => $dataAllKamar,
            'dataPending'       => $dataPending,
            'dataBayar'         => $dataBayar,
            'dataOut'           => $dataOut,
            'viewUser'          => $dataAllUser,
            'statusAda'         => $dataStatusAda,
            'statusKosong'      => $dataStatusTdk
        ];
        return view('dashboard/dashboard' , $data);
        
    }

    public function tampilUser(){
        if(session('role_id') == 1){
            return redirect()->to('/');
        }
        $id=session('id');
        $User               = $this->userModel->user($id);

        $data = [
            'judul'     => 'Data User',
            'user'      => $this->userModel->where('role_id' , 1)->findAll(),
            'User'      => $User
        ];
        return view('dashboard/tampil_user' , $data);
    }

    public function detailUser($id){
        if(session('role_id') == 1){
            return redirect()->to('/');
        }

        

        $data['judul']  = 'Edit User';
        $data['user'] = $this->userModel->where('id_user',$id)->findAll();
        $data['User'] = $this->userModel->user(session('id'));
        return view('dashboard/detail_user' , $data);
    }

    public function editProfileStaff($id){
        $data = [
            'judul'     => 'Edit Profile',
            'profile'   => $this->userModel->where('id_user',$id)->findAll(),
            'User'      => $this->userModel->user(session('id'))

        ];
        return view('dashboard/edit_profile_staff' , $data);
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
            'conf_password'=>[
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sama'
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
        return redirect()->to('/profile/staff');
    }

    public function profile(){
        if(session('role_id') == 1){
            return redirect()->to('/');
        }

        $id= session('id');

        $data = [
            'judul'     => 'PROFILE',
            'profile'   => $this->userModel->user($id),
            'User'      => $this->userModel->user($id)

        ];

        return view('dashboard/profile_staff' , $data);
    }
}
