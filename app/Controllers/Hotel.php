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

    public function buatKamar()
    {
        $data['judul'] = "Buat kamar";
        // ini nanti diisi database kamar
        return view('admin/buat_kamar' ,$data);
    }
}
