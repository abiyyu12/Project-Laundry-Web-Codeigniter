<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Admin MawarLaundry</title>

  <!-- General CSS Files -->
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>/stisla-master/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/stisla-master/node_modules/@fortawesome/fontawesome-free/css/all.css">
    <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>/stisla-master/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/stisla-master/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>/stisla-master/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="<?=base_url()?>/stisla-master/assets/img/avatar/avatar-1.png" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat Datang Di <span class="font-weight-bold">Mawar Laundry</span></h4>
            <p class="text-muted">Sebelum memulai harap masukan Username dan Password yang telah diberikan sebelumnya.</p>
            <?php 
                    if(session()->getFlashdata('error')):
                  ?>
                  <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">X</button>
                      <b>Error ! </b>
                      <?= session()->getFlashdata('error') ?>
                    </div>
                  </div>
            <?php endif; ?>
            <form method="POST" action="<?= base_url('admin/') ?>" class="needs-validation" autocomplete="off">
              <?= csrf_field() ?>
              <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="username" class="form-control <?php if(!empty($validation['errors']['username'])){echo($validation['errors']['username']) ? 'is-invalid' : ''; }?>" name="username" tabindex="1" value="<?= old('username') ?>" autofocus>
                <div class="invalid-feedback">
                  <?php if(!empty($validation['errors']['username'])){ echo $validation['errors']['username'];}?>
                </div>
              </div>
              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control <?php if(!empty($validation['errors']['password'])){echo($validation['errors']['password']) ? 'is-invalid' : ''; }?>" name="password" tabindex="2" value="<?= old('password') ?>" autofocus>
                <div class="invalid-feedback">
                  <?php if(!empty($validation['errors']['password'])){ echo $validation['errors']['password'];}?>
                </div>
              </div>

              <div class="form-group">
                <!-- <div class="custom-control custom-checkbox">
                  <input type="hidden" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me"></label>
                </div> -->
              </div>

              <div class="form-group text-right">
                <a href="auth-forgot-password.html" class="float-left mt-3">
                </a>
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                <a href="auth-register.html"></a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; Mawar Laundry. Made with 💙 by Stisla
              <div class="mt-2">
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?=base_url()?>/stisla-master/assets/img/unsplash/laundry-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Login Admin</h1>
                <h5 class="font-weight-normal text-muted-transparent">MawarLaundry,Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/N5YPeQ-x42k">Mathias Reding</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  
  <script src="<?=base_url()?>/stisla-master/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="<?=base_url()?>/stisla-master/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>/stisla-master/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?=base_url()?>/stisla-master/assets/js/stisla.js"></script>
  <script src="<?=base_url()?>/stisla-master/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>/stisla-master/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

  <script src="<?=base_url()?>/stisla-master/node_modules/chart.js/dist/Chart.min.js"></script>
  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?=base_url()?>/stisla-master/assets/js/scripts.js"></script>
  <script src="<?=base_url()?>/stisla-master/assets/js/custom.js"></script>
  <!-- Page Specific JS File -->
</body>
</html>