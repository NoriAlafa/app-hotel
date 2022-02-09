<?php

namespace App\Controllers;

class Admin extends BaseController{
    protected $kamarModel;

    public function __construct(){
        helper('url');
        $this->kamarModel = new \App\Models\KamarModel();  
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
                    'required' =>'Nama Kamar Tidak Boleh Kosong',
                    'min_length'=>'Nama Kamar Terlalu Pendek'
                ]
            ],
            'deskripsi'    =>[
                'rules' =>'required',
                'errors'=>[
                    'required' =>'Deskripsi Tidak Boleh Kosong'
                ]
            ],
            'tipe_kamar'    =>[
                'rules' =>'',
                'errors'=>[

                ]
            ],
            'harga_kamar'    =>[
                'rules' =>'',
                'errors'=>[

                ]
            ],
            'fasilitas'    =>[
                'rules' =>'',
                'errors'=>[

                ]
            ],
            'gambar'    =>[
                'rules' =>'',
                'errors'=>[

                ]
            ],
        ]);

        if(!$validasi){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }else{
            //ini nanti dibuat untuk gambar
        }

        $data = [
            'nama_kamar'        => $this->request->getPost('nama_kamar'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tipe_kamar'        => $this->request->getPost('gender'),
            'status'            => 'tersedia',
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'fasilitas'         => $this->request->getPost('fasilitas'),
            'gambar'            => $this->request->getPost('gambar')
        ];

        $this->kamarModel->insert($data);
        return redirect()->to('/dataHotel');
    }
}