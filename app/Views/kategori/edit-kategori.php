<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>


<h5 class="card-title">Master Kategori Produk</h5>
<p class="card-text">Tambahkan data kategori baru pada halaman ini</p>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <form class="forms-sample" action="<?= site_url('perbarui-kategori'); ?>" method="POST">
        <div class="form-group row">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kategori Produk</label>
          <div class="col-sm-9">

            <input type="hidden" class="form-control" id="exampleInputUsername2" name="id_kategori" value="<?= $detailKategori[0]['id_kategori'];?>">
            <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Masukan Kategori Produk" name="nama_kategori" required name="kategori_produk" value="<?= $detailKategori[0]['nama_kategori'];?>">
          </div>
        </div>
        <button type="submit" class="btn btn-gradient-primary me-2">Simpan</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>