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
    protected $allowedFields    = ['id_kamar','nama_kamar','deskripsi' ,'tipe_kamar' , 'harga_kamar' ,'status_kamar' ,'id_fasilitas' ,'gambar' ,'created_at' , 'updated_at'];

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
      $builder = $this->db->table('tb_kamar');
      $builder->join('tb_fasilitas' , 'tb_fasilitas.id_fasilitas = tb_kamar.id_fasilitas');
      $builder->orderBy('id_kamar DESC');
      $query = $builder->get();
      return $query->getResultArray();
    }

    public function viewFasilitas($id){
      $builder = $this->db->table('tb_kamar');
      $builder->where('id_kamar' , $id);
      $builder->join('tb_fasilitas' , 'tb_fasilitas.id_fasilitas = tb_kamar.id_fasilitas');
      $query = $builder->get();
      return $query->getResultArray();
    }

    public function getPaginate($num,$keyword){
      $builder = $this->builder();
      if($keyword != ''){
        $builder->like('nama_kamar',$keyword);
      }
      return [
        'kamar'   =>$this->paginate($num),
        'pager'   =>$this->pager,
      ];
    }

    public function vipKamar(){
      $builder = $this->db->table('tb_kamar');
      $builder->select('tipe_kamar');
      $query = $builder->get();
      return $query->getResultArray();
    }

}