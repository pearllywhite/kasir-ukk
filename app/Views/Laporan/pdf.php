<!DOCTYPE <html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Download PDf Laporan</title>

</head>

<body>
    <h2>
    NAMA TOKO    <br/>
    Laporan Stok BARANG<br/>
    Per <?=date('d M Y');?> </h2>
    
    <table border=1 width=80% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:center">
        <thead>
            <tr bgcolor=silver align=center>
                <td width="5%">No</td>
                <td width="25%">Nama Prokduk</td>
                <td width="50%">Harga Jual</td>
                <td width="50%">Harga Beli</td>
                <td width="20%">Stok</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($listProduk)) :
                $no = 0; // inisialisasi nomor
                foreach ($listProduk as $baris) :
                    $no++;
            ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $baris->nama_produk ?></td>
                        <td><?= $baris->harga_beli ?></td>
                        <td><?= $baris->harga_jual ?></td>
                        <td><?= $baris->stok ?></td>
                    </tr>
            <?php
                endforeach;
            endif;
            ?>

        </tbody>
    </table>
     <p style="margin-left:450px">Mengetahui,<Br/>
     Petugas Stok Barang<br/>
     <br/>
     <br/>
     <b><em>Mutiara Gemilah Cahya Putri</em></b>   </p>


    <p><small><em>Digenerate oleh aplikasi SiStok &copy; <?=date('d-m-Y H:i:s');?> wib</em></small></p>
</body>

</html>