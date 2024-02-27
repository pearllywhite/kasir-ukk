<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengguna extends BaseController
{
    public function Pengguna()
    {
        $data = [
            'akses' => session()->get('level'),
            'listPengguna' => $this->pengguna->findAll(),
        ];
        return view('pengguna/list-pengguna', $data);
    }
    public function tambahPengguna()
    {
        $data = [
            'akses' => session()->get('level')
        ];
        return view('pengguna/tambah-pengguna', $data);
    }
    public function simpanPengguna()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'nama_user' => $this->request->getVar('nama_user'),
            'password' => md5($this->request->getVar('password')),
            'level' => $this->request->getVar('level'),
        ];
        $this->pengguna->save($data);
        session()->setFlashdata('tambah', 'Data berhasil ditambahkan');
        return redirect()->to('/data-pengguna');
    }

    public function editPengguna($idUser)
    {
        $syarat = [
            'username' => $idUser
        ];

        $data = [
            'akses' => session()->get('level'),
            'detailUser' => $this->pengguna->where($syarat)->findAll()
        ];
        return view('Pengguna/edit-pengguna', $data);
    }

    public function simpanEditPengguna($idUser)
    {

        $data = [
            'username' => $this->request->getVar('username'),
            'nama_user' => $this->request->getVar('nama_user'),
            'level' => $this->request->getVar('level')
        ];
        // var_dump($data);
        $this->pengguna->update($idUser, $data);
        session()->setFlashdata('edit', 'Data berhasil diupdate');
        return redirect()->to('/data-pengguna');
    }

    public function hapusPengguna($idUser)
    {
        $syarat = [
            'username' => $idUser
        ];
        $this->pengguna->where($syarat)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('/data-pengguna');
    }
}
