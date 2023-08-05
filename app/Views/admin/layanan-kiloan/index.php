<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Data Layanan-Kiloan &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <h1>Layanan</h1>
            <div class="section-header-button">
              <a href="<?= base_url('admin/layanan-kiloan/new') ?>" class="btn btn-primary">Tambah Layanan Kiloan</a>
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
                    <h4>Data Layanan Kiloan Mawar-laundry</h4>
                  </div>      
                  <div class="card-body p-3">
                    <div class="table-responsive">
                      <table class="table table-striped table-md" id="table1">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Harga(Kg)</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($layanan_kiloan as $key => $value) : ?>
                          <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $value->nama_layanan ?></td>
                            <td><?= "Rp.".number_format($value->harga,0,',','.'); ?></td>
                            <td class="text-center" style="width: 15%;">
                              <a href="<?= base_url('/admin/layanan-kiloan/'.$value->id_layanan.'/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              <!-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                              <form action="<?= base_url('admin/layanan-kiloan/'.$value->id_layanan.'/delete') ?>" id="del-<?=$value->id_layanan?>" method="post" class="d-inline">
                              <?= csrf_field() ?>
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Dengan menghapus data salah satu field maka seluruh data yang berkaitan dengan field ini akan hilang,yakin untuk menghapus?" data-confirm-yes="submitDel(<?=$value->id_layanan ?>)"><i class="fas fa-trash"></i></button>
                          </form>
                          </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
          </div>
</section>

<?= $this->endSection(); ?>