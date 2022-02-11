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
                    'is_image'=>'Yang Anda Pilih Bukan Gambar',
                    'mime_in' =>'Yang Anda Pilih Bukan Gambar'
                ]
            ],
        ]);

        if(!$validation){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        // // generate nama file random
        $namaGambar = $fileGambar->getRandomName();
        //save lokasi file
        $fileGambar->move('images' , $namaGambar);
        

        $data = [
            'nama_kamar'        => $this->request->getPost('nama_kamar'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tipe_kamar'        => $this->request->getPost('tipe_kamar'),
            'status'            => 'tersedia',
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'fasilitas'         => $this->request->getPost('fasilitas'),
            'gambar'            => $namaGambar
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
        $validation = $this->validate([
            'gambar'    =>[
                'rules' =>'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size'=>'Ukuran Gambar Tidak Boleh Melebihi 1MB',
                    'is_image'=>'Yang Anda Pilih Bukan Gambar',
                    'mime_in' =>'Yang Anda Pilih Bukan Gambar'
                ]
            ],
        ]);

        if(!$validation){
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        //cek gambar apakah berubah atau tidak
        if($fileGambar->getError()){
            $namaGambar = $this->request->getVar('gambarLama');
        }else{
            //generate nama file 
            $namaGambar = $fileGambar->getRandomName();
            //upload gambar
            $fileGambar->move('images' , $namaGambar);
            //hapus file lama
            unlink('images/' . $this->request->getVar('gambarLama'));
        }

        $data = [
            'nama_kamar'        => $this->request->getPost('nama_kamar'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tipe_kamar'        => $this->request->getPost('tipe_kamar'),
            'status'            => $this->request->getPost('status'),
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'fasilitas'         => $this->request->getPost('fasilitas'),
            'gambar'            => $namaGambar
        ];
        $this->kamarModel->update(['id_kamar' => $this->request->getPost('id_kamar')],$data);
        return redirect()->to('/dataHotel');
    }

    public function delete($id){
        $kamar = $this->kamarModel->find($id);
        unlink('images/' . $kamar['gambar']);
        $this->kamarModel->delete($id);
        return redirect()->to('/dataHotel');
    }
}