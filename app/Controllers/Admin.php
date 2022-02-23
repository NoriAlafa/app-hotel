<?php

namespace App\Controllers;

class Admin extends BaseController{
    protected $kamarModel;
    protected $userModel;

    public function __construct(){
        helper('url');
        $this->kamarModel = new \App\Models\KamarModel(); 
        $this->userModel = new \App\Models\UserModel(); 
    }

    public function index()
    {
        $dataAllKamar       = $this->kamarModel->get()->resultID->num_rows;
        $dataStatusAda      = $this->kamarModel->where('status' , 'Tersedia')->countAllResults();
        $dataStatusTdk      = $this->kamarModel->where('status' , 'Kosong')->countAllResults();
        $dataAllUser        = $this->userModel->get()->resultID->num_rows;
        $data = [
            'viewKamar'         => $dataAllKamar,
            'userCard'          => $this->userModel,
            'viewUser'          => $dataAllUser,
            'statusAda'         => $dataStatusAda,
            'statusKosong'      => $dataStatusTdk
        ];
        return view('admin/index_admin' , $data);
    }
    
    public function buatKamar(){
            $data['judul'] = "Tambah Hotel";
            // ini nanti diisi database kamar
            return view('admin/buat_kamar' ,$data);
    }

    public function tampilHotel()
    {
        $data['judul'] = "CRUD Hotel";
        $data['kamar'] = $this->kamarModel->findAll();
        // ini nanti diisi database kamar
        return view('admin/tampil_hotel' ,$data);
    }

    public function buatHotel(){
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


        $data = [
            'nama_kamar'        => $this->request->getPost('nama_kamar'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tipe_kamar'        => $this->request->getPost('tipe_kamar'),
            'status'            => 'tersedia',
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'fasilitas'         => $this->request->getPost('fasilitas'),
            'gambar'            => $this->request->getFile('gambar')
        ];
        
        $this->kamarModel->insert($data);
        return redirect()->to('/dataHotel');
    }

    public function edit($id){
        $data['judul']='Edit Kamar';

        $data['kamar']=$this->kamarModel->where('id_kamar',$id)->findAll();
        //tampilkan data di view
        return view('admin/edit_kamar',$data);
    }

    public function update(){
        $data = [
            'nama_kamar'        => $this->request->getPost('nama_kamar'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tipe_kamar'        => $this->request->getPost('tipe_kamar'),
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'status'            => $this->request->getPost('status'),
            'fasilitas'         => $this->request->getPost('fasilitas'),
            'gambar'            => $this->request->getFile('gambar')
        ];

        $this->kamarModel->update(['id_kamar' => $this->request->getPost('id_kamar')],$data);
        return redirect()->to('/dataHotel');
    }

    public function delete($id){
        $this->kamarModel->delete($id);
        return redirect()->to('/dataHotel');
    }
}