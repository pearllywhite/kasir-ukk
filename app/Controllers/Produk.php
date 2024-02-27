<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
// use App\Models\Mproduk;

class Produk extends BaseController
{

    // protected $Mproduk;
    // public function __construct()
    // {
    //     $this->Mproduk = new Mproduk();
    // }

    public function tampilProduk()
    {

        // $tbl_produk =  $this->Mproduk->findAll();
        
        $data =[
            // 'tbl_produk' => $tbl_produk,
            'akses' => session()->get('level'),
            'listProduk' => $this->produk->getAllProduk(),
            // 'detail_produk' => $this->Mproduk,

        ];
        return view('produk/list-produk', $data);
    }

    public function tambahProduk()
    {
        $data =[
            'akses' => session()->get('level'),
            'listSatuan' => $this->satuan_produk->findAll(),
            'listKategori' => $this->kategori_produk->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view('Produk/tambah-produk', $data);
    }

    public function simpanProduk()
    { 
        $validation = \Config\Services::validation();
        $HargaBeli = $this->request->getPost('harga_beli');

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'kode_produk' => [
                    'rules' => 'required|is_unique[tbl_produk.kode_produk]',
                    'errors' => [
                        'required' => 'Kode produk harus diisi.',
                        'is_unique' => 'Kode produk sudah tersedia.'
                    ]
                ],
                'nama_produk' => [
                    'rules' => 'required|is_unique[tbl_produk.nama_produk]',
                    'errors' => [
                        'required' => 'Nama produk harus diisi.',
                        'is_unique' => 'Produk sudah tersedia.'
                    ]
                ],
                'harga_beli' => [
                    'rules' => 'required|is_natural_no_zero|min_length[3]',
                    'errors' => [
                        'required' => 'Harga beli harus diisi.',
                        'is_natural_no_zero' => 'Kolom ini hanya boleh berisi angka',
                        'min_length' => 'Angka harus lebih dari 2'
                    ]
                ],
                'harga_jual' => [
                    'rules' => "required|is_natural_no_zero|greater_than_equal_to[$HargaBeli]",
                    'errors' => [
                        'required' => 'Harga jual harus diisi.',
                        'is_natural_no_zero' => 'Kolom ini hanya boleh berisi angka',
                        'greater_than_equal_to' => 'Harga jual harus lebih tinggi dari harga beli.'
                    ]
                ],
                'stok' => [
                    'rules' => 'required|is_natural_no_zero',
                    'errors' => [
                        'required' => 'Stock harus diisi.',
                        'is_natural_no_zero' => 'Kolom ini hanya boleh berisi angka dan harus lebih dari 0'
                    ]
                ],
            ];
            if (!$this->validate($rules)) {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->to('tambah-produk')->withInput()->with('errors', $validation->getErrors());
            }
        }

        $data = [
            'kode_produk'=> $this->request->getVar('kode_produk'),
            'nama_produk'=> $this->request->getVar('nama_produk'),
            'harga_beli'=> str_replace('.','',$this->request->getVar('harga_beli')),
            'harga_jual'=> str_replace('.','',$this->request->getVar('harga_jual')),
            'id_satuan'=> $this->request->getVar('jenis_satuan'),
            'id_kategori'=> $this->request->getVar('jenis_kategori'),
            'stok'=> $this->request->getVar('stok')
        ];
        $this->produk->save($data);
        return redirect()->to('/data-produk');
    }

    public function editProduk($idProduk)
    {
        $syarat = [
            'id_produk' => $idProduk
        ];
        $data = [
            'akses' => session()->get('level'),
            'listKategori'=>$this->kategori_produk->findAll(),
            'listSatuan'=>$this->satuan_produk->findAll(),
            'detailProduk'=>$this->produk->findAll(),
        ];
        return view('produk/edit-produk',$data);
        
    }
    public function simpaneditproduk()
    {
        $data=[
            // 'id_produk' =>$this->request->getVar('id_produk'),
            'kode_produk' =>$this->request->getVar('kode_produk'),
            'nama_produk' =>$this->request->getVar('nama_produk'),
            'harga_beli' =>str_replace(',','',$this->request->getVar('harga_beli')),
            'harga_jual' =>str_replace(',','', $this->request->getVar('harga_jual')),
            'id_satuan' =>$this->request->getVar('jenis_satuan'),
            'id_satuan' =>$this->request->getVar('jenis_kategori'),
            'stok' => str_replace(',','',$this->request->getVar('stok')),
        ];

        $this->produk->update($this->request->getVar('id_produk'),$data);
        return redirect()->to('/data-produk');
    }

    public function hapusProduk($idProduk)
    {
        $syarat =[
            'id_produk' =>$idProduk 
        ];
        $this->produk->where($syarat)->delete();
        return redirect()->to('/data-produk');
    }
 
    }
