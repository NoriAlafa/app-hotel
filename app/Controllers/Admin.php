<?php

namespace App\Controllers;

use App\Models\KamarModel;
use App\Models\UserModel;
use App\Models\ReservationModel;
use App\Models\FasilitasModel;

class Admin extends BaseController{

    public function __construct(){
        helper('url');
        $this->kamarModel       = new KamarModel(); 
        $this->userModel        = new UserModel(); 
        $this->resepModel       = new ReservationModel();
        $this->fasilitasModel   = new FasilitasModel();

    }

    
    
    public function buatKamar(){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }

            $data['judul'] = "Tambah Hotel";
            $data['fasilitas']      = $this->fasilitasModel->findAll();
            // ini nanti diisi database kamar
            return view('admin/crud/buat_kamar' ,$data);
    }

    public function tampilHotel()
    {
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $data['judul']          = "CRUD Hotel";
        $data['kamar']          = $this->kamarModel->fasilitas();
        // ini nanti diisi database kamar
        return view('admin/crud/tampil_hotel' ,$data);
    }

    public function buatHotel(){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $validation = $this->validate([
            'nama_kamar'    =>[
                'rules' =>'required|min_length[4]',
                'errors'=>[
                    'required'      =>'Nama Kamar Tidak Boleh Kosong',
                    'min_length'    =>'Nama Kamar Terlalu Pendek'
                ]
            ],
            'deskripsi'    =>[
                'rules' =>'required',
                'errors'=>[
                    'required' =>'Deskripsi Tidak Boleh Kosong'
                ]
            ],
            'tipe_kamar'    =>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>' Tipe Kamar Tidak Boleh Kosong'
                ]
            ],
            'harga_kamar'    =>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Harga Kamar Tidak Boleh Kosong'
                ]
            ],
            'gambar'    =>[
                'rules' =>'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'uploaded'=>'Gambar Belum Dipilih',
                    'max_size'=>'Ukuran Gambar Tidak Boleh Melebihi 1MB',
                    'is_image'=>'Yang Anda Pilih Bukan Gambar'
                ]
            ],
        ]);

        if(!$validation){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $gambar = $this->request->getFile('gambar');
        // $gambar->move('images/');
        if ($gambar->isValid() && ! $gambar->hasMoved()) {
            $fileGambar = $gambar->getName();
            $gambar->move('images/' , $fileGambar);
        }
       

        $data = [
            'nama_kamar'        => $this->request->getPost('nama_kamar'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tipe_kamar'        => $this->request->getPost('tipe_kamar'),
            'status_kamar'      => 'Tersedia',
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'id_fasilitas'      => $this->request->getPost('id_fasilitas'),
            'gambar'            => $fileGambar
        ];
        
        session()->setFlashdata('success' , "Berhasil Ditambah");
        $this->kamarModel->insert($data);
        return redirect()->to('/dataHotel');
    }

    public function edit($id){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data['judul']='Edit Kamar'; 
        $data['kamar']=$this->kamarModel->viewFasilitas($id);
        $data['fasilitas'] = $this->fasilitasModel->findAll();
        //tampilkan data di view
        return view('admin/crud/edit_kamar',$data);
        
    }

    public function update($id){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $gambar = $this->request->getFile('gambar');
        $pindah = $this->kamarModel->find($id);
        if($gambar->isValid() && !$gambar->hasMoved()){
            $old_image_file = $pindah['gambar'];
            if(file_exists("images/".$old_image_file)){
                unlink("images/".$old_image_file);
            }
            $fileGambar = $gambar->getName();
            $gambar->move('images/' , $fileGambar);
        }

        $data = [
            'nama_kamar'        => $this->request->getPost('nama_kamar'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tipe_kamar'        => $this->request->getPost('tipe_kamar'),
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'status_kamar'      => $this->request->getPost('status_kamar'),
            'id_fasilitas'      => $this->request->getPost('id_fasilitas'),
            'gambar'            => $fileGambar
        ];

        $this->kamarModel->update($id,$data);
        return redirect()->to('/dataHotel');
    }

    public function delete($id){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        
        $gambar = $this->kamarModel->find($id);
        $fileGambar = $gambar['gambar'];
        if(file_exists("images/" . $fileGambar)){
            unlink("images/" . $fileGambar);
        }
        $this->kamarModel->delete($id);
        return redirect()->to('/dataHotel');
    }
}