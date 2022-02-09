<?php

namespace App\Controllers;

class Admin extends BaseController{
    protected $kamarModel;

    public function __construct(){
        helper('url');
        $this->kamarModel = new \App\Models\KamarModel();
    }
    
    public function buatKamar(){
            $data['judul'] = "Tambah Hotel";
            // ini nanti diisi database kamar
            return view('admin/buat_kamar' ,$data);
    }

    public function tampilHotel()
    {
        $data['judul'] = "CRUD Hotel";
        // ini nanti diisi database kamar
        return view('admin/tampil_hotel' ,$data);
    }
}