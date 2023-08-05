<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Data Transaksi Kiloan &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <h1>Transaksi Kiloan</h1>
            <div class="section-header-button">
              <a href="<?= base_url('admin/transaksi-kiloan/new') ?>" class="btn btn-primary">Tambah Transaksi Kiloan</a>
            </div>
          </div>
                  <?php 
                    if(session()->getFlashdata('success')):
                  ?>
                  <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">X</button>
                      <b>Success ! </b>
                      <?= session()->getFlashdata('success') ?>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php 
                    if(session()->getFlashdata('error')):
                  ?>
                  <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">X</button>
                      <b>Success ! </b>
                      <?= session()->getFlashdata('error') ?>
                    </div>
                  </div>
                  <?php endif; ?>
          <div class="section-body">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Transaksi Kiloan Mawar-laundry</h4>
                  </div>
                  <div class="card-header">
                    <form method="get" action="" autocomplete="off">
                        <div class="float-left">
                          <input class="form-control me-2" type="search" value="<?=$keyword ?>" placeholder="Search" aria-label="Search" name="keyword">
                        </div>
                        <div class="float-right ml-2">
                          <button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-search"></i></button>
                        <?php 
                          $request = \Config\Services::request();
                          $keyword = $request->getGet('keyword');
                          if($keyword != ''){
                            $param = "?keyword=".$keyword;
                          }else if($f_tgl_transaksi != ''){
                            $param = "?keyword=".$f_tgl_transaksi;
                          }
                          else{
                            $param = "";
                          }
                        ?>
                          <a href="<?= site_url('admin/transaksi-kiloan/export-excel'.$param) ?>" class="btn btn-primary ml-2"><i class="fas fa-file-excel"></i> Export Excel</a>
                          <a href="<?= site_url('admin/transaksi-kiloan/export-pdf'.$param) ?>" class="btn btn-danger ml-2"><i class="fas fa-file-pdf"></i> Export PDF</a>
                        </div>
                    </form>
                  </div>      
                  <div class="card-body p-3">
                    <div class="card-header" style="margin-left: -18px; margin-top: -30px;" >
                    <form action="" method="get">
                      <div class="float-left">
                        <input type="date" value="<?= $f_tgl_transaksi ?>" name="f_tgl_transaksi" id="f_tgl_transaksi" class="form-control me-2" style="width: 190px;">
                      </div>
                      <div class="float-right ml-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i></button>
                      </div>
                    </form>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Admin</th>
                            <th>Pemilik Cabang</th>
                            <th>Tgl-Transaksi</th>
                            <th>Tgl-Pengambilan</th>
                            <th>Tgl-Selesai</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                           $page =isset($_GET['page']) ? $_GET['page'] : 1;
                           $no = 1 + (10 * ($page - 1));
                           foreach($TransaksiKiloan as $key => $value) : ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama_pelanggan ?></td>
                            <td><?= $value->nama_admin!=null ? $value->nama_admin : 'Online' ?></td>
                            <td><?= $value->nama_pemilik!=null ? $value->nama_pemilik : 'Pusat' ?></td>
                            <td><?= date('d/m/y',strtotime($value->tgl_transaksi)) ?></td>
                            <td><?= $value->tgl_pengambilan=="0000-00-00" ? "00/00/00" :date('d/m/y',strtotime($value->tgl_pengambilan)) ?></td>
                            <td><?= $value->tgl_selesai=="0000-00-00" ? "00/00/00" :date('d/m/y',strtotime($value->tgl_selesai)) ?></td>
                            <td><?= 'Rp.'.number_format($value->total_harga,0,',','.'); ?></td>
                            <td>
                              <?php if($value->status == 'selesai'){ ?>
                                <div class="badge badge-success">
                                  <?= $value->status ?>
                                </div>
                              <?php } ?>
                              <?php if($value->status == 'pengiriman'){ ?>
                                <div class="badge badge-primary">
                                  <?= $value->status ?>
                                </div>
                              <?php } ?>
                              <?php if($value->status == 'batal'){ ?>
                                <div class="badge badge-danger">
                                  <?= $value->status ?>
                                </div>
                              <?php } ?>
                              <?php if($value->status == 'proses'){ ?>
                                <div class="badge badge-warning">
                                  <?= $value->status ?>
                                </div>
                              <?php } ?>
                            </td>
                            <td class="text-center" style="width: 15%;">
                              <a href="<?= site_url('/admin/transaksi-kiloan/'.$value->id_transaksi.'/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              <!-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                              <form action="<?= site_url('admin/transaksi-kiloan/'.$value->id_transaksi.'/delete') ?>" id="del-<?=$value->id_transaksi?>" method="post" class="d-inline">
                              <?= csrf_field() ?>
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Dengan menghapus data salah satu field maka seluruh data yang berkaitan dengan field ini akan hilang,yakin untuk menghapus?" data-confirm-yes="submitDel(<?=$value->id_transaksi ?>)"><i class="fas fa-trash"></i></button>
                              </form>
                              <a href="<?= site_url('/admin/'.$value->id_transaksi.'/detail-kiloan') ?>" class="btn btn-info btn-sm"><i class="fas fa-info"></i></a>
                          </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="float-left">
                      <i>Showing <?= 1 + (10 * ($page -1)) ?> to <?= $no-1 ?> of <?= $pager->getTotal() ?> entries </i> 
                    </div>
                    <div class="float-right">
                    <?= $pager->links('default','paginate-tsatuan') ?>
                    </div>
                    </div>
                  </div>
                </div>
          </div>
</section>

<?= $this->endSection(); ?>