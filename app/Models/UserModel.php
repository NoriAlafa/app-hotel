<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user','nama','email' ,'nik' , 'password' ,'role_id' ,'created_at' , 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function user($id){
        $builder = $this->db->table('tb_user');
        $builder->join('tb_role' , 'tb_role.role_id = tb_user.role_id');
        $builder->where('id_user' , $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    
}