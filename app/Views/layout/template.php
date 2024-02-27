<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kasir UKK pearly</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=base_url('/PurpleAdmin/assets/vendors/mdi/css/materialdesignicons.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('/PurpleAdmin/assets/vendors/css/vendor.bundle.base.css');?>">
    <link rel="stylesheet" href="<?=base_url('/PurpleAdmin/assets/vendors/select2/select2.min.css');?>">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=base_url('/PurpleAdmin/assets/css/style.css');?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=base_url('/PurpleAdmin/images/favicon.ico');?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?=session()->get('level');?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=site_url('logout');?>">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Logout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            
            

            
        </div>
      </nav>
      
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('halaman-admin');?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <?php if ($akses == 'Admin') : ?>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Data Produk</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?=site_url('satuan-produk');?>">Satuan</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=site_url('satuan-kategori');?>">Kategori </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=site_url('data-produk');?>">Produk</a></li>
                </ul>
              </div>
            </li>
            <?php endif; ?>

            <?php if ($akses == 'Kasir') : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('transaksi-jual');?>">
                <span class="menu-title">Transaksi</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <?php endif; ?>
           
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('laporan');?>">
                <span class="menu-title">Laporan</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('data-pengguna');?>">
                <span class="menu-title">pengguna</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            </li>
           
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  
                </div>
               
                <div class="mt-4">
                  <div class="border-bottom">
                  
                  </div>
                 
                </div>
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <?php echo $this->renderSection('konten');?>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=base_url('/PurpleAdmin/assets/vendors/js/vendor.bundle.base.js');?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=base_url('/PurpleAdmin/assets/js/off-canvas.js');?>"></script>
    <script src="<?=base_url('/PurpleAdmin/assets/js/hoverable-collapse.js');?>"></script>
    <script src="<?=base_url('/PurpleAdmin/assets/js/misc.js');?>"></script>
    <script src="<?=base_url('/PurpleAdmin/assets/vendors/jquery-mask/jquery.mask.min.js');?>"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <link href="PurpleAdmin/assets/DataTables/datatables.min.css" rel="stylesheet">

     <script src="<?=base_url('/PurpleAdmin/assets/js/min.js');?>></script>
     <script src="<?=base_url('/PurpleAdmin/assets/vendors/select2/js/select2.min.js');?>"></script>
      
     
   
    



    <script>
		  $(document).ready(function(){
			$('.js-example-basic-single').select2();
		}  );
	</script>

    <script>
      $(document).ready(function(){
        //merubah angka menjadi format uang
        $('.uang').mask('000.000.000.000.000',{reverse: true});

        //merubah angka menjadi format barang stok
        $('.barang').mask('000.000',{reverse:true});
    }   );
    </script>
    
  </body>
</html>