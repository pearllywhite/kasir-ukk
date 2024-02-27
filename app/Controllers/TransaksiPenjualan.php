<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TransaksiPenjualan extends BaseController
{
    public function transaksi()
    {
        $data = [
        
            'akses' => session()->get('level'),
            'no_faktur' => $this->penjualan->buatFaktur(),
            // 'barang'   => $this->detail->findAll(),
            'produkList' => $this->produk->getAllProduk(),
            'detailPenjualan' => $this->detail->getDetailPenjualan(session()->get('IdPenjualan')),
            'totalHarga' => $this->penjualan->getTotalHargaById(session()->get('IdPenjualan')),
            
        ];

        return view('Transaksi/transaksi-penjual', $data);
    }

    public function transaksiSimpan()
    {
        // ambil detail barang yang dijual
        $where = ['id_produk' => $this->request->getPost('id_produk')];

        $cekBarang = $this->produk->where($where)->findAll();
        $hargaJual = $cekBarang[0]['harga_jual'];


        if (session()->get('IdPenjualan') == null) {
            // 1. Menyiapkan data penjualan
            date_default_timezone_set('Asia/Jakarta');
            // Mendapatkan waktu saat ini dalam zona waktu yang telah diatur
            $tanggal_sekarang = date('Y-m-d H:i:s');
            // 1 nampung data penjualan
            $dataPenjualan = [
                'no_faktur' => $this->request->getPost('no_faktur'),
                'tgl_penjualan' => $tanggal_sekarang,
                'username' => session()->get('username'),
                'total' => 0
            ];

            //2 simpan ke tabel penjualan
            $this->penjualan->insert($dataPenjualan);

            //3 nyiapin data baut nyimpen detail
            $idPenjualanBaru = $this->penjualan->insertID(); // Mendapatkan ID penjualan baru
            $dataDetailPenjualan = [
                'id_penjualan' => $this->penjualan->insertID(),
                'id_produk' => $this->request->getPost('id_produk'),
                'qty' => $this->request->getPost('qty'),
                'total_harga' => $hargaJual * $this->request->getPost('qty')
            ];
           
            //4 simpan ke detail penjualan
            $this->detail->insert($dataDetailPenjualan);
            // var_dump($dataDetailPenjualan);


            // 5. Membuat session untuk penjualan baru
            session()->set('IdPenjualan', $idPenjualanBaru);
        } else {
            // Jika ada ID penjualan yang sudah tersimpan di sesi, gunakan ID itu untuk menyimpan detail penjualan
            $idPenjualanSaatIni = session()->get('IdPenjualan');

            //3 nyiapin data baut nyimpen detail
            $dataDetailPenjualan = [
                'id_penjualan' => session()->get('IdPenjualan'),
                'id_produk' => $this->request->getPost('id_produk'),
                'qty' => $this->request->getPost('qty'),
                'total_harga' => $hargaJual * $this->request->getPost('qty')
            ];

            //4 simpan ke detail penjualan
            $this->detail->insert($dataDetailPenjualan);
        }
        return redirect()->to('transaksi-jual');
        // var_dump($dataDetailPenjualan);
    }

    public function simpanPembayaran()
    {
        // Mendapatkan ID penjualan yang selesai
        $idPenjualanSelesai = session()->get('IdPenjualan');

        // Menghapus ID penjualan dari sesi
        session()->remove('IdPenjualan');

        // Mengarahkan pengguna kembali ke halaman transaksi penjualan
        return redirect()->to('transaksi-jual');
    }

}
