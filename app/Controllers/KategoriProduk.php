<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mkategori;

class KategoriProduk extends BaseController
{
    public function Kategori()
    {
        $data = [
            'akses' => session()->get('level'),
            'listKategori' => $this->kategori_produk->findAll()
        ];
        return view('Kategori/list-kategori', $data);
    }

    public function tambahKategori()
    {

        $data = [
            'akses' => session()->get('level'),
            'validation' => \Config\Services::validation()
        ];

        return view('Kategori/tambah-kategori', $data);
    }

    public function simpanKategori()
    {
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nama_kategori' => [
                    'rules' => 'required|is_unique[tbl_kategori.nama_kategori]',
                    'errors' => [
                        'required' => 'Nama kategori harus diisi.',
                        'is_unique' => 'Kategori sudah tersedia.'
                    ]
                ],
            ];
            if (!$this->validate($rules)) {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->to('/tambah-kategori')->withInput()->with('errors', $validation->getErrors());
            }
        }

        $data = [
            'nama_kategori' =>$this->request->getVar('nama_kategori')
        ];
        // var_dump($data);
        $this->kategori_produk->save($data);
        return redirect()->to('/satuan-kategori');
    }

    public function editKategori($idKategori)
    {
        $syarat = [
           'id_kategori' => $idKategori
        ];
        $data = [
            'akses' => session()->get('level'),
            'detailKategori' => $this->kategori_produk->where($syarat)->findAll(),
        ];
        return view('kategori/edit-kategori', $data);
    }

    public function simpanEditKategori()
    {
        $data = [
            'akses' => session()->get('level'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ];
        $this->kategori_produk->update($this->request->getVar('id_kategori'), $data);
        return redirect()->to('/satuan-kategori');
    }

    public function hapusKategori($idKategori)
    {
        $syarat = [  
            'id_kategori' => $idKategori
        ];
        $this->kategori_produk->where($syarat)->delete();

        return redirect()->to('/satuan-kategori');
    }
}
