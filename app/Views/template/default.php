
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <!-- <title>Blank Page &mdash; Stisla</title> -->
  <?= $this->renderSection('title') ?>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->

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
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Project Menu
              </div>
              <div class="search-item">
                <a href="<?= base_url('admin/dashboard') ?>">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-fire"></i>
                  </div>
                  Dahsboard
                </a>
              </div>
              <div class="search-item">
                <a href="<?= base_url('admin/pelanggan') ?>">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-user"></i>
                  </div>
                  Pelanggan
                </a>
              </div>
              <div class="search-item">
                <a href="<?= base_url('admin/pegawai') ?>">
                  <div class="search-icon bg-success text-white mr-3">
                    <i class="fas fa-user-tie"></i>
                  </div>
                  Pegawai
                </a>
              </div>
              <div class="search-item">
                <a href="<?= base_url('admin/cabang') ?>">
                  <div class="search-icon bg-warning text-white mr-3">
                    <i class="fas fa-building"></i>
                  </div>
                  Cabang
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Transaksi Satuan Hari Ini
                <div class="float-right">
                  <a href="#"></a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="<?= base_url('/admin/transaksi-satuan?keyword='.date('y-m-d'))?>" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Selesai</b>
                    <div class="time"><?= getTransactionCondition('selesai','transaksi_satuan') ?> Pesanan</div>
                  </div>
                </a>
                <a href="<?= base_url('/admin/transaksi-satuan?keyword='.date('y-m-d')) ?>" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-truck"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Pengiriman</b>
                    <div class="time"><?= getTransactionCondition('pengiriman','transaksi_satuan') ?> Pesanan</div>
                  </div>
                </a>
                <a href="<?= base_url('/admin/transaksi-satuan?keyword='.date('y-m-d')); ?>" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Batal</b>
                    <div class="time"><?= getTransactionCondition('batal','transaksi_satuan') ?> Pesanan</div>
                  </div>
                </a>
                <a href="<?= base_url('/admin/transaksi-satuan?keyword='.date('y-m-d'))?>" class="dropdown-item">
                  <div class="dropdown-item-icon bg-warning text-white">
                    <i class="fas fa-exchange-alt"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Proses</b>
                    <div class="time"><?= getTransactionCondition('proses','transaksi_satuan') ?> Pesanan</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="<?= base_url('/admin/transaksi-satuan?keyword=') ?>">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="fas fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Transaksi Kiloan Hari Ini
                <div class="float-right">
                  <a href="#"></a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="<?= base_url('/admin/transaksi-kiloan?keyword='.date('y-m-d'))?>" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Selesai</b>
                    <div class="time"><?= getTransactionCondition('selesai','transaksi_kiloan') ?> Pesanan</div>
                  </div>
                </a>
                <a href="<?= base_url('/admin/transaksi-kiloan?keyword='.date('y-m-d')) ?>" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-truck"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Pengiriman</b>
                    <div class="time"><?= getTransactionCondition('pengiriman','transaksi_kiloan') ?> Pesanan</div>
                  </div>
                </a>
                <a href="<?= base_url('/admin/transaksi-kiloan?keyword='.date('y-m-d')); ?>" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Batal</b>
                    <div class="time"><?= getTransactionCondition('batal','transaksi_kiloan') ?> Pesanan</div>
                  </div>
                </a>
                <a href="<?= base_url('/admin/transaksi-kiloan?keyword='.date('y-m-d'))?>" class="dropdown-item">
                  <div class="dropdown-item-icon bg-warning text-white">
                    <i class="fas fa-exchange-alt"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Proses</b>
                    <div class="time"><?= getTransactionCondition('proses','transaksi_kiloan') ?> Pesanan</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="<?= base_url('/admin/transaksi-kiloan?keyword=') ?>">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?=base_url()?>/stisla-master/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi,<?= adminLogin()->nama_admin ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Menu</div>
              <a href="<?= base_url('admin/profile') ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <!-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a> -->
              <!-- <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('/admin/logout') ?>" class="dropdown-item has-icon text-danger" id="logout" data-confirm="Logout?|Apakah Anda Yakin ingin keluar?" data-confirm-yes="returnLogout()">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('/admin/dashboard') ?>">Mawar-laundry</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('/admin/dashboard') ?>">MwLy</a>
          </div>
          <ul class="sidebar-menu">
              <?= $this->include('template/menu') ?>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <?= $this->renderSection('content') ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Design By Mawar <a href="#"> Laundry</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
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
  <?= $this->renderSection('chart') ?>
  <!-- Page Specific JS File -->
</body>
</html>
