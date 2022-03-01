<?php

namespace App\Controllers;
use App\Models\ReservationModel;
class Resepsionis extends BaseController
{
    public function __construct(){
        $this->resepModel = new ReservationModel();
    }
    public function konfirKamar()
    {
        $dataPesan          = $this->resepModel->reservasi(); 
        $data     = [
            'judul' =>'Konfirmasi Orderan kamar',
            'dataRev'   =>$dataPesan
        ];
        // ini nanti diisi database kamar
        return view('resepsionis/konfirmasi' ,$data);
    }
}