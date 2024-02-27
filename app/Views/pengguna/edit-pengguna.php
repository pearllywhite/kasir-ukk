<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-0">From Edit Pengguna</h6>
                            <form action="<?=site_url('perbarui-pengguna/'). $detailUser[0]['username'];?>" method="POST">
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="inputUsn" name="username" value="<?= $detailUser[0]['username']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" id="inputNama" name="nama_user" value="<?= $detailUser[0]['nama_user']; ?>">
                                    </div>
                                    
                                    
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Level</label>
                                    <select id="level" class="form-control" name="level"> 
                                        <option selected>pilih jenis level</option>
                                        <option value="Admin" <?= $detailUser[0]['level']== 'Admin' ? 'selected' : null; ?>>Admin</option>
                                        <option value="Kasir" <?= $detailUser[0]['level']== 'Kasir' ? 'selected' : null; ?>>Kasir</option>
                                    </select>


                                    
                                </div>
                                <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <div>
                            </form>
                        </div>
                    </div>

<?= $this->endSection();?>