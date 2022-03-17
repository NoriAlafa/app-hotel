<?php

namespace App\Controllers;

use App\Models\KamarModel;
use App\Models\UserModel;
use App\Models\ReservationModel;

class Home extends BaseController
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

        $chart              = $this->resepModel->chart();
        $Barchart           = $this->resepModel->Barchart();
        $dataAllKamar       = $this->kamarModel->get()->resultID->num_rows;
        $dataStatusAda      = $this->kamarModel->where('status_kamar' , 'Tersedia')->countAllResults();
        $dataStatusTdk      = $this->kamarModel->where('status_kamar' , 'Kosong')->countAllResults();
        $dataPending        = $this->resepModel->where('status_rev' , 'booking')->countAllResults();
        $dataBayar          = $this->resepModel->where('status_rev' , 'bayar')->countAllResults();
        $dataOut            = $this->resepModel->where('status_rev' , 'out')->countAllResults();
        $dataAllUser        = $this->userModel->where('role_id' , 1)->countAllResults();
        $data = [
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
        return view('dashboard' , $data);
        
    }

    public function tampilUser(){
        if(session('role_id') == 1){
            return redirect()->to('/');
        }

        $data = [
            'judul'     => 'Data User',
            'user'      => $this->userModel->where('role_id' , 1)->findAll()
        ];
        return view('tampil_user' , $data);
    }

    public function detailUser($id){
        if(session('role_id') == 1){
            return redirect()->to('/');
        }

        $data['judul']  = 'Edit User';
        $data['user'] = $this->userModel->where('id_user',$id)->findAll();
        return view('detail_user' , $data);
    }
}
