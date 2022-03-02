<?php

namespace App\Controllers;

use App\Models\KamarModel;
use App\Models\UserModel;
use App\Models\ReservationModel;

class Admin extends BaseController{

    public function __construct(){
        helper('url');
        $this->kamarModel       = new KamarModel(); 
        $this->userModel        = new UserModel(); 
        $this->resepModel       = new ReservationModel();

    }

    public function index()
    {
        if(session('role_id') != 2){
            return redirect()->to('/');
        }

        $dataAllKamar       = $this->kamarModel->get()->resultID->num_rows;
        $dataStatusAda      = $this->kamarModel->where('status' , 'Tersedia')->countAllResults();
        $dataStatusTdk      = $this->kamarModel->where('status' , 'Kosong')->countAllResults();
        $dataPending        = $this->resepModel->where('status_rev' , 'booking')->countAllResults();
        $dataBayar          = $this->resepModel->where('status_rev' , 'bayar')->countAllResults();
        $dataOut            = $this->resepModel->where('status_rev' , 'out')->countAllResults();
        $dataAllUser        = $this->userModel->get()->resultID->num_rows;
        $data = [
            'viewKamar'         => $dataAllKamar,
            'dataPending'       => $dataPending,
            'dataBayar'         => $dataBayar,
            'dataOut'           => $dataOut,
            'viewUser'          => $dataAllUser,
            'statusAda'         => $dataStatusAda,
            'statusKosong'      => $dataStatusTdk
        ];
        return view('admin/index_admin' , $data);
    }
    
    public function buatKamar(){
        if(session('role_id') != 2){
            return redirect()->to('/');
        }

            $data['judul'] = "Tambah Hotel";
            // ini nanti diisi database kamar
            return view('admin/buat_kamar' ,$data);
    }

    public function tampilHotel()
    {
        if(session('role_id') != 2){
            return redirect()->to('/');
        }

        $data['judul'] = "CRUD Hotel";
        $data['kamar'] = $this->kamarModel->findAll();
        // ini nanti diisi database kamar
        return view('admin/tampil_hotel' ,$data);
    }

    public function buatHotel(){
        if(session('role_id') != 2){
            return redirect()->to('/');
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
            'fasilitas'    =>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Fasilitas Kamar Tidak Boleh Kosong'
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
            $fileGambar = $gambar;
            $gambar->move('images/' , $fileGambar);
        }

        $data = [
            'nama_kamar'        => $this->request->getPost('nama_kamar'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tipe_kamar'        => $this->request->getPost('tipe_kamar'),
            'status'            => 'tersedia',
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'fasilitas'         => $this->request->getPost('fasilitas'),
            'gambar'            => $fileGambar
        ];
        
        session()->setFlashdata('success' , "Berhasil Ditambah");
        $this->kamarModel->insert($data);
        return redirect()->to('/dataHotel');
    }

    public function edit($id){
        if(session('role_id') != 2){
            return redirect()->to('/');
        }
        $data['judul']='Edit Kamar';

        $data['kamar']=$this->kamarModel->where('id_kamar',$id)->findAll();
        //tampilkan data di view
        return view('admin/edit_kamar',$data);
    }

    public function update(){
        if(session('role_id') != 2){
            return redirect()->to('/');
        }

        $gambar = $this->request->getFile('gambar');
        $fileGambar = $gambar->getName();
        $gambar->move('images/' , $fileGambar);

        

        $data = [
            'nama_kamar'        => $this->request->getPost('nama_kamar'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tipe_kamar'        => $this->request->getPost('tipe_kamar'),
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'status'            => $this->request->getPost('status'),
            'fasilitas'         => $this->request->getPost('fasilitas'),
            'gambar'            => $fileGambar
        ];

        $this->kamarModel->update(['id_kamar' => $this->request->getPost('id_kamar')],$data);
        return redirect()->to('/dataHotel');
    }

    public function delete($id){
        if(session('role_id') != 2){
            return redirect()->to('/');
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