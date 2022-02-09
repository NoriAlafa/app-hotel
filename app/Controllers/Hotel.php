<?php

namespace App\Controllers;

class Hotel extends BaseController
{
    protected $userModel;
    protected $kamarModel;

    public function __construct(){
        helper('url');
        $this->userModel = new \App\Models\UserModel();
        $this->kamarModel = new \App\Models\KamarModel();
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

    public function profile()
    {
        $data['profile'] =$this->userModel->findAll();
        return view('user/profile' ,$data);
    }

    
}
