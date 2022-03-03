<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\KamarModel;
class Resepsionis extends BaseController
{
    public function __construct(){
        helper('url');
        $this->resepModel = new ReservationModel();
        $this->kamarModel = new KamarModel();
        
    }

    public function konfirKamar()
    {
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->to('/dashboard');
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
            return redirect()->to('/dashboard');
        }

        $resep = $this->resepModel->find($id);
        if(is_array($resep)){
            $data['judul']      ='Edit Konfirmasi';
            $data['kamar']  = $this->kamarModel->findAll();
            $data['resep']      = $resep;
            return view('resepsionis/edit_konfir',$data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            
        }
    }

}