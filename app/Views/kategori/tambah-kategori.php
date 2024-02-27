<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>

<h5 class="card-title">Master Kategori Produk</h5>
    <p class="card-text">Tambahkan data baru pada halaman ini</p>
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="<?= site_url('simpan-kategori'); ?>" method="POST">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kategori Produk</label>
                        <div class="col-sm-9">
                          <input type="hidden" class="from-control" id="inputJenis" name="id_kategori">
                          <input type="text" class="form-control <?php if (session('errors.nama_kategori')) : ?>is-invalid<?php endif ?>" id="exampleInputUsername2" placeholder="Masukan Kategori Produk" name="nama_kategori" value="<?= old('nama_kategori') ?>" autocomplete="off">
                            <div class="ms-1">
                              <?php if (session()->has('errors')) : ?>
                                <?php foreach (session('errors') as $field => $error) : ?>
                                  <?php if ($field === 'nama_kategori') : ?>
                                    <span class="text-danger text-xxs"><?= $error ?></span>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Simpan</button>
                      &nbsp;<a href="/satuan-kategori" class="btn btn-danger">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>

<?= $this->endSection();?>