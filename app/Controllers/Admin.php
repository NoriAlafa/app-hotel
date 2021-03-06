<?php

namespace App\Controllers;

use App\Models\KamarModel;
use App\Models\UserModel;
use App\Models\ReservationModel;
use App\Models\FasilitasModel;
use App\Models\ServiceModel;

class Admin extends BaseController{

    public function __construct(){
        helper('url');
        $this->kamarModel       = new KamarModel(); 
        $this->userModel        = new UserModel(); 
        $this->resepModel       = new ReservationModel();
        $this->fasilitasModel   = new FasilitasModel();
        

    }

    public function detailKamar($id){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $data =[ 
            'detail'    =>$this->kamarModel->viewFasilitas($id),
            'judul'     =>'Detail Kamar' ,
            'User'      => $this->userModel->user(session('id'))
   
        ];
        return view('admin/crud/detail',$data);
    }
    
    public function buatKamar(){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }

            $data['judul'] = "Tambah Hotel";
            $data['fasilitas']      = $this->fasilitasModel->findAll();
            $data['User'] = $this->userModel->user(session('id'));

            // ini nanti diisi database kamar
            return view('admin/crud/buat_kamar' ,$data);
    }

    public function tampilHotel(){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $data['judul']          = "CRUD Hotel";
        $data['kamar']          = $this->kamarModel->fasilitas();
        $data['User'] = $this->userModel->user(session('id'));

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
                'rules' =>'uploaded[gambar]|max_size[gambar,3072]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'uploaded'=>'Gambar Belum Dipilih',
                    'max_size'=>'Ukuran Gambar Tidak Boleh Melebihi 3MB',
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
        $data['User'] = $this->userModel->user(session('id'));

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
            'tipe_kamar'        => $this->request->getPost('tipe_kamar'),
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'status_kamar'      => $this->request->getPost('status_kamar'),
            'id_fasilitas'      => $this->request->getPost('id_fasilitas'),
            'gambar'            => $fileGambar
        ];

        $this->kamarModel->update($id,$data);
        session()->setFlashdata('success' , "Berhasil Diupdate");
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

    public function userEdit($id){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data['judul']  = 'Edit User';
        $data['user'] = $this->userModel->where('id_user' , $id)->findAll();
        $data['User'] = $this->userModel->user(session('id'));

        return view('admin/user/edit_user' , $data);
    }

    public function userUpdate(){
        $validasi = $this->validate([
            'nama'=>[
                //jika username sudah ada di table dan harus diisi
                'rules' => 'min_length[4]',
                'errors' => [
                    'min_length' => 'Nama kurang lebih memiliki panjang 4 karakter'
                ]
            ],
            'email' =>[
                'rules' =>'is_unique[tb_user.email]|valid_email',
                'errors'=>[
                    'is_unique' =>'Email sudah dipakai user lain',
                    'valid_email'=>'Email tidak valid'
                ]
            ],
            'nik'  =>[
                'rules' =>'min_length[16]|integer',
                'errors'=>[
                    'min_length'=> 'Perhatikan panjang NIK Anda',
                    'integer'   => 'Oops NIK anda Illegal'
                ]
            ],
        ]);

        //jika data tidak sesuai kembali dan munculkan pesan error di form register.
        if(!$validasi){
            return redirect()->back()->withInput();
        }

        $data = [
            'nama'        => $this->request->getPost('nama'),
            'email'         => $this->request->getPost('email'),
            'bio'        => $this->request->getPost('bio'),
            'nik'       => $this->request->getPost('nik')
        ];

        $this->userModel->update(['id_user' => $this->request->getPost('id_user')] , $data);
        return redirect()->to('/user/view');
    }

    public function viewFasilitas(){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data['judul']  = 'Fasilitas';
        $data['fasilitas'] = $this->fasilitasModel->findAll();
        $data['User'] = $this->userModel->user(session('id'));

        return view('admin/fasilitas/tampil_fas' , $data);
    }

    public function addFasilitas(){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data['judul'] = 'Tambah Fasilitas';
        $data['User'] = $this->userModel->user(session('id'));

        return view('admin/fasilitas/tambah_fasilitas',$data);
    }
    
    public function insertFasilitas(){
        $data = [
            'id_fasilitas'      => $this->request->getPost('id_fasilitas'),
            'nama_fasilitas'    => $this->request->getPost('nama_fasilitas'),
        ];
        session()->setFlashdata('fasilitas' , "Data Fasilitas Di Trima");
        $this->fasilitasModel->insert($data);
        return redirect()->to('/fasilitas/kamar');
    }
    public function editFasilitas($id){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data['judul']     = 'Edit Fasilitas';
        $data['fasilitas'] = $this->fasilitasModel->where('id_fasilitas',$id)->findAll();
        $data['User'] = $this->userModel->user(session('id'));

        return view('admin/fasilitas/edit_fasilitas',$data);
    }

    public function updateFasilitas(){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data = [
            'nama_fasilitas'        => $this->request->getPost('nama_fasilitas'),
        ];
        session()->setFlashdata('fasilitas' , "Data Fasilitas Di Trima");
        $this->fasilitasModel->update(['id_fasilitas'   => $this->request->getPost('id_fasilitas')] , $data);
        return redirect()->to('/fasilitas/kamar');
    }
    public function deleteFasilitas($id){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $this->fasilitasModel->delete($id);
        return redirect()->to('/fasilitas/kamar');
    }

    public function listServices(){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $service = new ServiceModel();
        $data['service'] = $service->findAll();
        $data['User'] = $this->userModel->user(session('id'));
        return view('admin/services/list_services',$data);
    }

    public function tambahServices(){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data['User'] = $this->userModel->user(session('id'));
        return view('admin/services/tambah_services',$data);
    }


    public function insertServices(){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $service = new ServiceModel();

        $gambar = $this->request->getFile('img');
        // $gambar->move('images/');
        if ($gambar->isValid() && ! $gambar->hasMoved()) {
            $fileGambar = $gambar->getName();
            $gambar->move('images/services' , $fileGambar);
        }

        $data = [
            'id_services'           => $this->request->getPost('id_services'),
            'services'              => $this->request->getPost('services'),
            'detail_services'       => $this->request->getPost('detail_services'),
            'img'                   =>$fileGambar
        ];

        session()->setFlashdata('services' , 'berhasil ditambah');
        $service->insert($data);
        return redirect()->to('/list/services');
    }

    public function hapusServices($id){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $service = new ServiceModel();
        $gambar = $service->find($id);
        $fileGambar = $gambar['img'];
        if(file_exists("images/services/" . $fileGambar)){
            unlink("images/services/" . $fileGambar);
        }
        $service->delete($id);
        return redirect()->to('/list/services');
    }

    public function editServices($id){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $services = new ServiceModel();
        $data['service']    = $services->where('id_services',$id)->findAll();
        $data['User'] = $this->userModel->user(session('id'));
        return view('admin/services/edit_services',$data);
    }

    public function updateServices($id){
        if(session('role_id') != 2){
            session()->setFlashdata('admin' , 'Hanya Admin yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $services = new ServiceModel();

        $gambar = $this->request->getFile('img');
        $pindah = $services->find($id);
        if($gambar->isValid() && !$gambar->hasMoved()){
            $old_image_file = $pindah['img'];
            if(file_exists("images/services/".$old_image_file)){
                unlink("images/services/".$old_image_file);
            }
            $fileGambar = $gambar->getName();
            $gambar->move('images/services/' , $fileGambar);
        }

        $data = [
            'services'              => $this->request->getPost('services'),
            'detail_services'       => $this->request->getPost('detail_services'),
            'img'                   =>$fileGambar
        ];

        $services->update($id,$data);
        session()->setFlashdata('services' , "Berhasil Diupdate");
        return redirect()->to('/list/services');
    }
}