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

    public function print($id){
        $builder = $this->db->table('tb_reservasion');
        $builder->where('id_reservasion' , $id);
        $builder->join('tb_kamar' , 'tb_kamar.id_kamar = tb_reservasion.id_kamar')
        ->join('tb_user' , 'tb_user.id_user = tb_reservasion.id_user');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function updateResep($id){
        $builder = $this->db->table('tb_reservasion');
        $query = "UPDATE tb_reservasion a
        JOIN tb_kamar b ON a.id_kamar = b.id_kamar
        JOIN tb_user c ON  a.id_user = c.id_user
        SET a.column_c = a.column_c + 1";
        $update = $builder->query($query);
        return $update->getResultArray();
    }

   
}