<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>



<h5 class="card-title">Master Data Pengguna</h5>
    <p class="card-text">Berikut adalah data pengguna, tambahkan data baru pada halaman ini</p>
    <p><a href="<?= site_url('tambah-pengguna'); ?>" class="btn btn-primary">
    <i class="ri-add-circle-line"></i> Tambah</a></p>
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th width="10px"> No </th>
                          <th> Username </th>
                          <th> Nama Pengguna</th>
                          <th> Level</th>
                          <th> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        if(isset($listPengguna)){
                             $no = null;
                            foreach ($listPengguna as $baris)  {
                            
                            $no++
                            ?>

                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?=$baris['username'];?></td>
                                <td><?=$baris['nama_user'];?></td>
                                <td><?=$baris['level'];?></td>
                                <td> 
                               
                                    <a href="<?=site_url('/edit-pengguna/'. $baris['username']); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="<?=site_url('/hapus-pengguna/'. $baris['username']); ?>"><i class="fa-solid fa-trash"></i></a>

                                <?php
                            }
                        }
                        ?>
                            </tr>
                      </tbody>
                    </table>
                </div>
              </div>

        <?= $this->endSection();?>