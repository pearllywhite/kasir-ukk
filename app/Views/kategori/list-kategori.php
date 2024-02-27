<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<h5 class="card-title">Master Satuan Produk</h5>
    <p class="card-text">Berikut adalah data satuan produk, tambahkan data baru pada halaman ini</p>
    <p><a href="<?= site_url('tambah-kategori');?>" class="btn btn-danger btn-sm">
    <i class="mdi mdi-library-plus"></i> Tambah</a></p>
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th> Nama Satuan </th>
                          <th> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if(isset($listKategori)){
                             $no = null;
                            foreach ($listKategori as $baris)  {
                            
                            $no++
                            ?>

                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= ucwords($baris['nama_kategori']);?></td>
                                <td> 
                                    <a href=<?=site_url('/edit-kategori/'. $baris['id_kategori']);?>><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href=<?=site_url('/hapus-kategori/'. $baris['id_kategori']);?>><i class="fa-solid fa-trash"></i></a>
                                </td>

                                <?php
                            }
                        }
                        ?>
                        </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>

        <?= $this->endSection(); ?>