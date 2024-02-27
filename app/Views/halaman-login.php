
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Toko MGCP</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/PurpleAdmin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/Purpleadmin./assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/PurpleAdmin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/PurpleAdmin/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
               
                  <form action="<?=site_url('login-pengguna');?>"  method="POST">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputUser" name="username" placeholder="masukin Username" autocomplete="off">
                    <label for="flotingText">Username</label>
                  </div>
                  <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="inputUser" name="password" placeholder="password">
                    <label for="flotingPassword">Password</label>
                  </div>
                  
                  <button type="submit" class="btn btn-primary w-100">Login</button>
                  <?= session()->getFlashData('pesan'); ?>
                  </div>
                  
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/PurpleAdmin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/PurpleAdmin/assets/js/off-canvas.js"></script>
    <script src="/PurpleAdmin/assets/js/hoverable-collapse.js"></script>
    <script src="/PurpleAdmin/assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>
