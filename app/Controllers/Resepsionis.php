<?php

namespace App\Controllers;

class Resepsionis extends BaseController
{
    public function konfirKamar()
    {
        $data['judul'] = "Konfirmasi Orderan kamar";
        // ini nanti diisi database kamar
        return view('resepsionis/konfirmasi' ,$data);
    }
}