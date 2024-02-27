<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SatuanProduk extends BaseController
{
    public function satuan()
    {
        $data = [
            'akses' => session()->get('level'),
            'listSatuan' => $this->satuan_produk->findAll()
        ];
        return view('satuan/list-satuan', $data);
    }

    public function tambahSatuan()
    {
        $data = [
            'akses' => session()->get('level'),
            'validation' => \Config\Services::validation()
        ];
        return view('satuan/tambah-satuan', $data);
    }

    public function simpanSatuan()
    {
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nama_satuan' => [
                    'rules' => 'required|is_unique[tbl_satuan.nama_satuan]',
                    'errors' => [
                        'required' => 'Nama satuan harus diisi.',
                        'is_unique' => 'Satuan sudah terdaftar.'
                    ]
                ],
            ];
            if (!$this->validate($rules)) {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->to('/tambah-satuan')->withInput()->with('errors', $validation->getErrors());
            }
        }

        $data = [
            'nama_satuan' =>$this->request->getVar('nama_satuan')
        ];
        $this->satuan_produk->save($data);
        return redirect()->to('/satuan-produk');
    }

    public function editSatuan($idSatuan)
    {
        $syarat = [
            'id_satuan' => $idSatuan
        ];
        $data = [
            'akses' => session()->get('level'),
            'detailSatuan' => $this->satuan_produk->where($syarat)->findAll(),
        ];
        return view('satuan/edit-satuan', $data);
    }

    public function simpanEditSatuan()
    {
        $data = [
            'akses' => session()->get('level'),
            'id_kategori' => $this->request->getVar('id_satuan'),
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ];
        $this->satuan_produk->update($this->request->getVar('id_satuan'), $data);
        return redirect()->to('satuan-produk');
    }

    public function hapusSatuan($idSatuan)
    {
        $syarat = [
            
            'id_satuan' => $idSatuan
        ];
        $this->satuan_produk->where($syarat)->delete();
        return redirect()->to('/satuan-produk');
    }
}