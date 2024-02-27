<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">TRANSAKSI</h4>
      <form class="form-sample" action="<?= site_url('simpan-transaksi'); ?>" method="POST">
        <p class="card-description"> Silahkan lakukan transaksi </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="noFaktur" class="col-sm-3 col-form-label">No Faktur</label>
              <div class="col-sm-9">
                <label class="form-control" name="no_faktur" readonly=""><?= $no_faktur ?></label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kasir</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" readonly value="<?= session()->get('nama_user') ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kode Produk</label>
              <input type="hidden" class="form-control" value="<?= $no_faktur; ?>" name="no_faktur">
              <div class="col-sm-9">
                <select class="js-example-basic-singel form-select" name="id_produk">
                  <?php if (isset($produkList)) :
                    foreach ($produkList as $row) : ?>
                      <option value="<?= $row['id_produk']; ?>"><?= $row['nama_produk']; ?> | <?= $row['stok']; ?> | <?= number_format($row['harga_jual'], 0, ',', ','); ?></option>
                  <?php
                    endforeach;
                  endif; ?>
                </select>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanggal</label>
              <div class="col-sm-9">
                <input class="form-control" value="<?= date('Y-m-d'); ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="inputName" class="col-sm-3 col-form-label">Jumlah</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCity" name="qty" autocomplete="off">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group row">
            <button class="btn btn-primary" type="submit">
              <i class="mdi mdi-cart"></i>
            </button>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($detailPenjualan) && !empty($detailPenjualan)) :
                  $no = 1;
                  foreach ($detailPenjualan as $detail) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $detail['nama_produk']; ?></td>
                      <td><?= $detail['qty']; ?></td>
                      <td><?= number_format($detail['total_harga'], 0, ',', '.'); ?></td>
                    </tr>
                  <?php endforeach;
                else : ?>
                  <tr>
                    <td colspan="4">Tidak ada produk</td>
                  </tr>
                <?php endif; ?>
              </tbody>
              </tbody>
            </table>
          </div>
          <div class="col-13">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title ">TOTAL : RP <?= number_format($totalHarga, 0, ',', '.'); ?> </h3>
              </div>

              <div class="card-body">
                <div class="mb-6">
                  <label class="form-label">BAYAR</label>
                  <input type="text" name="txtbayar" class="form-control" id="txtbayar">

                </div>
                <div class="mb-3">
                  <label class="form-label">KEMBALI</label>
                  <input type="text" name="kembali" class="form-control" id="kembali" readonly>

                </div>
                <div class="card-footer text-end">
                  <a href="<?= site_url('pembayaran') ?>" class="btn btn-primary">
                    SIMPAN
                  </a>

                </div>









              </div>


              </thead>


              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Ambil elemen-elemen yang diperlukan
    var txtBayar = document.getElementById('txtbayar');
    var kembali = document.getElementById('kembali');
    var totalHarga = <?= $totalHarga ?>; // Ambil total harga dari controller dan diteruskan ke view

    // Tambahkan event listener untuk memantau perubahan pada input bayar
    txtBayar.addEventListener('input', function() {
      // Ambil nilai yang dibayarkan
      var bayar = parseFloat(txtBayar.value);

      // Hitung kembaliannya
      var kembalian = bayar - totalHarga;

      // Tampilkan kembaliannya pada input kembali
      if (kembalian >= 0) {
        kembali.value = kembalian.toFixed(2).replace(/(\.00)+$/, ''); // Menampilkan hingga 2 digit desimal
      } else {
        kembali.value = '0'; // Jika kembalian negatif, tampilkan '0.00'
      }
    });
  });
</script>


<?= $this->endSection(); ?>