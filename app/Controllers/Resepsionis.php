<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\KamarModel;
use App\Models\UserModel;
use Dompdf\Dompdf;

class Resepsionis extends BaseController
{
    public function __construct(){
        helper('url');
        $this->resepModel = new ReservationModel();
        $this->kamarModel = new KamarModel();
        $this->userModel = new UserModel();
        
    }

    public function konfirKamar()
    {
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $dataPesan          = $this->resepModel->reservasi(); 
        $data     = [
            'judul' =>'Konfirmasi Orderan kamar',
            'dataRev'   =>$dataPesan
        ];
        // ini nanti diisi database kamar
        return view('resepsionis/konfirmasi' ,$data);
    }

    public function edit($id){
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data['judul']      = 'Edit Pemesanan';
        $data['dataRev']    = $this->resepModel->edit($id);
        return view('resepsionis/edit_konfir',$data);
    }

    public function update($id){
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        
        $id_kmr = $this->request->getPost('id_kamar');
        $data = [
            'status_kamar'      => $this->request->getPost('status_kamar'),        
            'harga_kamar'       => $this->request->getPost('harga_kamar'),
            'tgl_check_out'     => $this->request->getPost('tgl_check_out'),
            'status_rev'        => $this->request->getPost('status_rev'),
            'pembayaran'        => $this->request->getPost('pembayaran')
        ];
 
        $this->kamarModel->update($id_kmr , $data);
        $this->resepModel->update($id,$data);
        return redirect()->to('/konfirmasiRoom');
    }

    public function printPesan($id){
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data['judul']      = 'Pesanan Anda';
        $data['dataRev']    = $this->resepModel->print($id);
        $html = view('resepsionis/print',$data);

        // instantiate and use the dompdf class
        $dompdf = new \Dompdf\Dompdf(['isRemoteEnabled' => true]);
        
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("data_pendaftaran.pdf",["Attachment"=>0
    ]);
    }
}