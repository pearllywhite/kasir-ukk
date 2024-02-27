<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpengguna extends Model
{
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'username';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username','nama_user', 'password', 'level'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    


    public function getPengguna($pengguna, $pass)
    {
        $where = [
            'username' => $pengguna,
            'password' => md5($pass)
        ];
        $pengguna = new Mpengguna;
        $pengguna->select("tbl_user.username, tbl_user.nama_user, tbl_user.password, tbl_user.level");
        $pengguna->where($where);
        return $pengguna->findAll();
    }

    public function getMenuByRole($userRole)
    {
        $query = $this->db->table('tbl_user')
        ->where('level', $userRole)
        ->get();

        return $query->getResultArray();
    }
}