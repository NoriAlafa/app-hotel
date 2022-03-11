<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table            = 'tb_reservasion';
    protected $primaryKey       = 'id_reservasion';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_reservasion','id_user' ,'id_kamar','tgl_check_in','tgl_check_out' ,'pembayaran' , 'status' , 'created_at' , 'updated_at'];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function reservasi(){
        $builder = $this->db->table('tb_reservasion')
        ->join('tb_kamar' , 'tb_kamar.id_kamar = tb_reservasion.id_kamar')->join('tb_user' , 'tb_user.id_user = tb_reservasion.id_user');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function edit($id){
        $builder = $this->db->table('tb_reservasion');
        $builder->where('id_reservasion' , $id);
        $builder->join('tb_kamar' , 'tb_kamar.id_kamar = tb_reservasion.id_kamar')
        ->join('tb_user' , 'tb_user.id_user = tb_reservasion.id_user');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function updateResep($id,array $data){
        $id_kmr     = $data['id_kamar'];
        $check_out  = $data['tgl_check_out'];
        $status_rev = $data['status_rev'];
        $status     = $data['status_kamar'];
        $harga      = $data['harga_kamar'];
        $bayar      = $data['pembayaran'];

        $builder = $this->db->table('tb_reservasion');
        $builder->join('tb_kamar', 'tb_reservasion.id_kamar = tb_kamar.id_kamar');
        $builder->set('tb_kamar.id_kamar' , $id_kmr);
        $builder->set('tb_reservasion.tgl_check_out' , $check_out);
        $builder->set('tb_reservasion.status_rev',$status_rev);
        $builder->set('tb_kamar.status_kamar',$status);
        $builder->set('tb_kamar.harga_kamar',$harga);
        $builder->set('tb_reservasion.pembayaran',$bayar);
        $builder->where('tb_reservasion.id_reservasion' , $id);
        $query=$builder->update('tb_reservasion');
        // $query = $builder->get();
        return $query->getResultArray();
    }

    public function print($id){
        $builder = $this->db->table('tb_reservasion');
        $builder->where('id_reservasion' , $id);
        $builder->join('tb_kamar' , 'tb_kamar.id_kamar = tb_reservasion.id_kamar')
        ->join('tb_user' , 'tb_user.id_user = tb_reservasion.id_user');
        $query = $builder->get();
        return $query->getResultArray();
    }
   
}