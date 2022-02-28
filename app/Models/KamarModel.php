<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_kamar';
    protected $primaryKey       = 'id_kamar';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kamar','nama_kamar','deskripsi' ,'tipe_kamar' , 'harga_kamar' ,'status' ,'fasilitas' ,'gambar' ,'created_at' , 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /*fasilitas diroom hotel
      ini nanti ditampilkan di dalam room php
      dijoin dengan table fasilitas
    */
    public function fasilitas(){
        $this->db->table('tb_kamar')->join();
    }

}