<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<h5 class="card-title">Master Satuan Produk</h5>
    <p class="card-text">Berikut adalah data satuan produk, tambahkan data baru pada halaman ini</p>
    <p><a href="<?= site_url('tambah-produk'); ?>" class="btn btn-danger btn-sm">
    <i class="mdi mdi-library-plus"></i> Tambah</a></p>
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th>Kode Produk</th>
                          <th> Nama Produk</th>
                          <th>Harga Beli</th>
                          <th>Harga Jual</th>
                          <th>Satuan</th>
                          <th>Kategori</th>
                          <th>Stok</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $no =null;
                         foreach ($listProduk as $baris):
                          $no++
                          ?>

                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?=$baris ['kode_produk'];?></td>
                                <td><?= ucwords($baris ['nama_produk']);?></td>
                                <td><?=$baris ['harga_beli'];?></td>
                                <td><?=$baris ['harga_jual'];?></td>
                                <td><?=ucwords($baris ['nama_satuan']);?></td>
                                <td><?=ucwords($baris ['nama_kategori']);?></td>
                                <td><?=$baris ['stok'];?></td>
                                
                                <td> 
                                    <a href="<?=site_url('/edit-produk/'. $baris['id_produk']); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="<?=site_url('/hapus-produk/'. $baris['id_produk']); ?>"><i class="fa-solid fa-trash"></i></a>


                                    <?php
                                    endforeach;
                                    
                                    ?>
                              


        <?= $this->endSection(); ?>