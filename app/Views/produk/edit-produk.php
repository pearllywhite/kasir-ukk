<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-0">From Edit Produk</h6>
                <form action="<?= site_url('perbarui-produk'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Kode Produk</label>
                        <input type="hidden" class="form-control" id="InputId" value="<?= $detailProduk[0]['id_produk']; ?>" name="id_produk">
                        <input type="text" class="form-control" id="inputkode" value="<?= $detailProduk[0]['kode_produk'] ?>" name="kode_produk">
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="InputNama" value="<?= ucwords($detailProduk[0]['nama_produk']); ?>" name="nama_produk">
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Harga Beli</label>
                        <input type="text" class="form-control" id="InputHb" value="<?= $detailProduk[0]['harga_beli']; ?>" name="harga_beli">

                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Harga Jual</label>
                        <input type="text" class="form-control" id="InputHj" value="<?= $detailProduk[0]['harga_jual']; ?>" name="harga_jual">
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Satuan Produk</label>
                        <select class="form-control" id="inputSatuan" name="jenis_satuan">
                            <?php

                            if (isset($listSatuan)) {
                                $no = null;
                                foreach ($listSatuan as $baris) {
                                    $no++;
                                    $detailProduk[0]['id_satuan'] == $baris['id_satuan'] ? $pilih = 'selected' : $pilih = null;

                                    echo '<option ' . $pilih . ' value="' . $baris['id_satuan'] . '">' . $baris['nama_satuan'] . ' </option>';
                                }
                            }

                            ?>
                        </select>

                    </div>
                    <div class="col-12">
                        <label for="inputName" class="form-label">Kategori Produk</label>
                        <select class="form-control" id="inputJenis" name="jenis_kategori">
                            <?php

                            if (isset($listKategori)) {
                                $no = null;
                                foreach ($listKategori as $baris) {
                                    $no++;
                                    $detailProduk[0]['id_kategori'] == $baris['id_kategori'] ? $pilih = 'selected' : $pilih = null;

                                    echo '<option value="' . $baris['id_kategori'] . '">' . $baris['nama_kategori'] . '</option>';
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Stok</label>
                        <input type="text" class="form-control barang" id="inputStok" value="<?= $detailProduk[0]['stok']; ?>" name="stok">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <div>
                </form>
            </div>
        </div>

        <?= $this->endSection(); ?>