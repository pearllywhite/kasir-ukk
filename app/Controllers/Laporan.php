<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Laporan extends BaseController
{
    public function datalaporan()
    {
        $data = [
            'akses' => session()->get('level'),
            'listLaporan' => $this->produk->getStok(),
    ];
    return view('laporan/data-laporan',$data);
        
    }
}
