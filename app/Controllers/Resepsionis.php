<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\KamarModel;
use App\Models\UserModel;
use App\Models\PesanModel;
use Dompdf\Dompdf;

class Resepsionis extends BaseController
{
    public function __construct(){
        helper('url');
        $this->resepModel = new ReservationModel();
        $this->kamarModel = new KamarModel();
        $this->userModel = new UserModel();
        $this->pesanModel = new PesanModel();
        
    }

    public function konfirKamar(){
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $dataPesan          = $this->resepModel->reservasi(); 
        $data     = [
            'judul' =>'Konfirmasi Orderan kamar',
            'dataRev'   =>$dataPesan,
            'User' => $this->userModel->user(session('id'))

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
        $data['User'] = $this->userModel->user(session('id'));

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

    public function tampilPesan(){
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->back();
        }

        $data = [
            'judul'     => 'Pesan Pengunjung',
            'pesan'     => $this->pesanModel->findAll(),
            'User'      => $this->userModel->user(session('id'))

        ];
        return view('resepsionis/pesan_pengunjung' , $data);
    }

    public function hapusPesan($id){
        $this->pesanModel->delete($id);
        return redirect()->to('/pesan/pengunjung');
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
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("data_pembayaran.pdf",["Attachment"=>0]);
    }

    public function printSemua(){
        if(session('role_id') != 3){
            session()->setFlashdata('resep' , 'Hanya Resepsionis yang bisa mengakses halaman ini');
            return redirect()->back();
        }
        $data['judul']      = 'Pesanan Anda';
        $data['dataRev']    = $this->resepModel->printSemua();
        $data['totalBayar']    = $this->resepModel->get_jumlah();
        $html = view('resepsionis/print_semua',$data);

        // instantiate and use the dompdf class
        $dompdf = new \Dompdf\Dompdf(['isRemoteEnabled' => true]);
        
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("rekap_pemesanan.pdf",["Attachment"=>0]);
    }
}