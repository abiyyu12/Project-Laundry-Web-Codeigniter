<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Data Detail Transaksi &mdash; MyLaundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <h1>Detail Transaksi</h1>
            <div class="section-header-button">
              <a href="<?= base_url('admin/'.$id_transaksi.'/detail-satuan/new') ?>" class="btn btn-primary">Tambah Detail Transaksi</a>
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
                  <div class="card-header" style="display: block;">
                    <h4>Data Detail Transaksi Satuan Mawar-laundry</h4>
                    <form action="/admin/detail-satuan/export-pdf" method="post">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                      <button type="submit" class="btn btn-danger mt-2"><i class="fas fa-file-pdf"></i> Print Invoice</button>
                    </form>
                  </div>      
                  <div class="card-body p-3">
                    <div class="table-responsive">
                      <table class="table table-striped table-md" id="table1">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Nama Pegawai</th>
                            <th>Harga</th>
                            <th>Jumlah Barang</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if(!empty($detail_satuan)){ 
                          foreach($detail_satuan as $key => $value) : ?>
                          <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $value->layanan ?></td>
                            <td><?= $value->nama_pegawai ?></td>
                            <td><?= 'Rp.'.number_format($value->harga,0,'.','.');  ?></td>
                            <td><?= $value->jml_barang ?></td>
                            <td class="text-center" style="width: 15%;">
                              <a href="<?= base_url('/admin/detail-satuan/'.$value->id_detail.'/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              <!-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                              <form action="<?= base_url('admin/detail-satuan/'.$value->id_detail.'/delete') ?>" id="del-<?=$value->id_detail?>" method="post" class="d-inline">
                              <?= csrf_field() ?>
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda Yakin?" data-confirm-yes="submitDel(<?=$value->id_detail ?>)"><i class="fas fa-trash"></i></button>
                          </form>
                          </td>
                          </tr>
                          <?php endforeach;} ?>
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
          </div>
</section>

<?= $this->endSection(); ?>