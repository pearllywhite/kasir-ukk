<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use App\Models\Mproduk;

class PdfController extends BaseController
{
    public function index()
    {
        $data =[
            'listProduk'=>$this->produk->getLaporanProduk()
        ];
        return view('Laporan/pdf', $data);
    }

    public function generate()
    {
        $filename = date('y-m-d-h-i-s'). '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $data =[
            'listProduk'=>$this->produk->getLaporanProduk()
        ];
        $html = view('Laporan/pdf', $data);
        $dompdf->loadHtml($html);

        // (optimal) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as pdf
        $dompdf->render();

        // output the generate pdf
        $dompdf->stream($filename);
    }
}