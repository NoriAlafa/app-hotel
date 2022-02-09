<?php

namespace App\Controllers;

class Hotel extends BaseController
{
    

    public function lamanDepan()
    {
        return view('user/laman_depan');
    }

    public function lamanKamar()
    {
        return view('user/room_detail');
    }

    
}
