<li class="menu-header">Master</li>
              <li class="nav-item">
                <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/pelanggan') ?>" class="nav-link"><i class="fas fa-user"></i><span>Pelanggan</span></a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/pegawai') ?>" class="nav-link"><i class="fas fa-user-tie"></i><span>Pegawai</span></a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/cabang') ?>" class="nav-link"><i class="fas fa-building"></i><span>Cabang</span></a>
              </li>
</li>
<li class="menu-header">Laundry</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Laundry Satuan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('/admin/transaksi-satuan') ?>">Transaksi</a></li>
                  <li><a class="nav-link" href="<?= base_url('/admin/layanan-satuan') ?>">Layanan Laundry</a></li>
                  <li><a class="nav-link" href="<?= base_url('/admin/barang') ?>">Barang</a></li>
              </ul>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-table"></i> <span>Laundry Kiloan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('/admin/transaksi-kiloan') ?>">Transaksi</a></li>
                  <li><a class="nav-link" href="<?= base_url('admin/layanan-kiloan') ?>">Layanan Laundry</a></li>
              </ul>
  </li>
  