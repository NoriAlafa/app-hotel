<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\KamarModel;
use App\Models\UserModel;

class Resepsionis extends BaseController
{
    public function __construct(){
        helper('url');
        $this->resepModel = new ReservationModel();
        $this->kamarModel = new KamarModel();
        $this->userModel = new UserModel();
        
    }

    public function konfirKamar()
    {
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $dataPesan          = $this->resepModel->reservasi(); 
        $data     = [
            'judul' =>'Konfirmasi Orderan kamar',
            'dataRev'   =>$dataPesan
        ];
        // ini nanti diisi database kamar
        return view('resepsionis/konfirmasi' ,$data);
    }

    public function edit($id){
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data['judul']      = 'Edit Pemesanan';
        $data['dataRev']    = $this->resepModel->where('id_reservasion' , $id)->reservasi();
        return view('resepsionis/edit_konfir',$data);
    }

    public function update(){
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $data = [
            'nama'                  => $this->request->getPost('nama'),
            'tgl_check_in'          => $this->request->getPost('tgl_check_in'),
            'tgl_check_out'         => $this->request->getPost('tgl_check_out'),
            'status_rev'            => $this->request->getPost('status_rev'),
            'harga_kamar'           => $this->request->getPost('harga_kamar'),
            'status'                => $this->request->getPost('status'),
            'kamar'                 => $this->request->getPost('nama_kamar')
        ];

        $this->resepModel->update(['id_reservasion' => $this->request->getPost('id_reservasion')],$data);
        $this->kamarModel->update(['id_kamar' => $this->request->getPost('id_kamar')],$data);
        $this->userModel->update(['id_user' => $this->request->getPost('id_user')],$data);
        return redirect()->to('/konfirmasiRoom');
    }

}