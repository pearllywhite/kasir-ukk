<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<!-- <?php
print_r($listSatuan);
?> -->

<h5 class="card-title">Master Satuan Produk</h5>
    <p class="card-text">Berikut adalah data satuan produk, tambahkan data baru pada halaman ini</p>
    <p><a href="<?= site_url('tambah-satuan'); ?>" class="btn btn-primary">
    <i class="ri-add-circle-line"></i> Tambah</a></p>
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th width="10px"> No </th>
                          <th> Nama Satuan </th>
                          <th> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if(isset($listSatuan)){
                             $no = null;
                            foreach ($listSatuan as $baris)  {
                            
                            $no++
                            ?>

                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= ucwords($baris['nama_satuan']);?></td>
                                <td> 
                                    <a href="<?=site_url('/edit-satuan/'. $baris['id_satuan']); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="<?=site_url('/hapus-satuan/'. $baris['id_satuan']); ?>"><i class="fa-solid fa-trash"></i></a>


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