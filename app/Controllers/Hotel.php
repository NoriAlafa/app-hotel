<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KamarModel;
use CodeIgniter\Pager\PagerRenderer;

class Hotel extends BaseController
{

    public function __construct(){
        helper('url');
        $this->userModel = new UserModel();
        $this->kamarModel = new KamarModel();
    }

    public function lamanDepan()
    {
        return view('user/laman_depan');
    }

    public function lamanKamar($id)
    {
        $data['judul']      ='Kamar';
        $data['viewKamar']  =$this->kamarModel->viewFasilitas($id);
        return view('user/room_detail' , $data);
    }

    public function hotelKamar(){
        $data['judul'] = 'Kamar';
        $data['kamar'] = $this->kamarModel->findAll();
        $data['kamar'] = $this->kamarModel->paginate(9);
        $data['pager'] = $this->kamarModel->pager;
        return view('user/room' , $data);
    }

    public function kontak()
    {
        return view('user/contact');
    }

    public function payment()
    {
        return view('user/pembayaran');
    }

    public function profile()
    {
        $data['profile'] =$this->userModel->findAll();
        return view('user/profile' ,$data);
    }

    
}
