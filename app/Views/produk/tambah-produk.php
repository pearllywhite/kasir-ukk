<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-0">From Tambah Produk</h6>
                            
                            <form action="<?=site_url('simpan-produk');?>" method="POST">
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Kode Produk</label>
                                    <input type="hidden" class="form-control" id="InputProduk" name="id_produk">
                                    <input type="text" class="form-control <?php if (session('errors.kode_produk')) : ?>is-invalid<?php endif ?>" id="inputkode" name="kode_produk" placeholder="Masukan Kode Produk" autofocus autocomplete="off" value="<?= old('kode_produk') ?>">
                                        <div class="ms-2">
                                            <?php if (session()->has('errors')) : ?>
                                            <?php foreach (session('errors') as $field => $error) : ?>
                                                <?php if ($field === 'kode_produk') : ?>
                                                <span class="text-danger text-xxs"><?= $error ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control <?php if (session('errors.nama_produk')) : ?>is-invalid<?php endif ?>" id="inputProduk" name="nama_produk" name="produk" placeholder="Masukan Nama Produk" autofocus autocomplete="off" value="<?= old('nama_produk') ?>">
                                        <div class="ms-2">
                                            <?php if (session()->has('errors')) : ?>
                                            <?php foreach (session('errors') as $field => $error) : ?>
                                                <?php if ($field === 'nama_produk') : ?>
                                                <span class="text-danger text-xxs"><?= $error ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Harga Beli</label>
                                    <input type="text" class="form-control <?php if (session('errors.harga_beli')) : ?>is-invalid<?php endif ?>" id="inputHb" name="harga_beli" name="produk" placeholder="Masukan Harga Beli" autofocus autocomplete="off" value="<?= old('harga_beli') ?>">
                                        <div class="ms-2">
                                            <?php if (session()->has('errors')) : ?>
                                            <?php foreach (session('errors') as $field => $error) : ?>
                                                <?php if ($field === 'harga_beli') : ?>
                                                <span class="text-danger text-xxs"><?= $error ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Harga Jual</label>
                                    <input type="text" class="form-control <?php if (session('errors.harga_jual')) : ?>is-invalid<?php endif ?>" id="inputHj" name="harga_jual" name="produk" placeholder="Masukan Harga Jual" autofocus autocomplete="off" value="<?= old('harga_jual') ?>">
                                        <div class="ms-2">
                                            <?php if (session()->has('errors')) : ?>
                                            <?php foreach (session('errors') as $field => $error) : ?>
                                                <?php if ($field === 'harga_jual') : ?>
                                                <span class="text-danger text-xxs"><?= $error ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                </div>
                              
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Satuan Produk</label>
                                    <select class="form-control" id="inputSatuan" name="jenis_satuan">
                                    <?php

                                    if (isset($listSatuan)){
                                        $no = null;
                                        foreach ($listSatuan as $baris) {
                                            $no++;

                                            echo '<option value="'. $baris['id_satuan'].'">'.ucwords($baris['nama_satuan']). '</option>';
                                        }
                                    
                                    }

                                    ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputName" class="form-label">Kategori Produk</label>
                                    <select class="form-control" id="inputJenis" name="jenis_kategori">
                                    <?php

                                    if (isset($listKategori)){
                                        $no = null;
                                        foreach ($listKategori as $baris) {
                                            $no++;

                                            echo '<option value="'. $baris['id_kategori'].'">'.ucwords($baris['nama_kategori']). '</option>';
                                        }

                                    }

                                    ?>
                                    </select>
                                </div>
                                    <div class="mb-3">
                                    <label for="inputName" class="form-label">Stok</label>
                                    <input type="text" class="form-control <?php if (session('errors.stok')) : ?>is-invalid<?php endif ?>" id="inputStok" name="stok" name="produk" placeholder="stok" autofocus autocomplete="off" value="<?= old('stok') ?>">
                                        <div class="ms-2">
                                            <?php if (session()->has('errors')) : ?>
                                            <?php foreach (session('errors') as $field => $error) : ?>
                                                <?php if ($field === 'stok') : ?>
                                                <span class="text-danger text-xxs"><?= $error ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                </div>
                                <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                &nbsp;<a href="/data-produk" class="btn btn-danger">Cancel</a>
                                <div>
                            </form>
                        </div>
                    </div>

<?= $this->endSection();?>