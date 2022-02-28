<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KamarModel;
class Hotel extends BaseController
{

    public function __construct(){
        helper('url');
        $this->userModel = new UserModel();
        $this->kamarModel = new KamarModel();
    }

    public function lamanDepan()
    {
        $data['kamar'] = $this->kamarModel->findAll();
        return view('user/laman_depan' , $data);
    }

    public function lamanKamar()
    {
        return view('user/room_detail');
    }

    public function hotelKamar(){
        $data['judul'] = 'Kamar';
        $data['kamar'] = $this->kamarModel->findAll();
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
