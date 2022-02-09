<?php

namespace App\Controllers;

class Hotel extends BaseController
{
    protected $userModel;

    public function __construct(){
        helper('url');
        $this->userModel = new \App\Models\UserModel();
    }

    public function lamanDepan()
    {
        return view('user/laman_depan');
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
