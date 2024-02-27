<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdetail extends Model
{
    protected $table            = 'tbl_detail_penjualan';
    protected $primaryKey       = 'id_detail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_detail','id_penjualan','no_faktur','id_produk','qty','total_harga'];

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

    public function getDetailPenjualan($idPenjualan)
    {
        /*
        return $this->db->table('tbl_detail_penjualan')
        ->select('tbl_detail_penjualan.*, tbl_penjualan.no_faktur, tbl_produk.nama_produk')
        ->join('tbl_penjualan', 'tbl_penjualan.id_penjualan = tbl_detail_penjualan.id_penjualan')
        ->join('tbl_produk', 'tbl_produk.id_produk = tbl_detail_penjualan.id_penjualan')
        ->where('tbl_detail_penjualan.id_penjualan', $idPenjualan)
        ->get() 
        ->getResultArray();*/

        $detail = New Mdetail;
        $detail->select('tbl_detail_penjualan.*, tbl_penjualan.no_faktur, tbl_produk.nama_produk');
        $detail->join('tbl_penjualan', 'tbl_penjualan.id_penjualan = tbl_detail_penjualan.id_penjualan');
        $detail->join('tbl_produk', 'tbl_produk.id_produk = tbl_detail_penjualan.id_produk');
        $detail->where('tbl_detail_penjualan.id_penjualan', $idPenjualan);
        return $detail->findAll();
    
    
    }
}

