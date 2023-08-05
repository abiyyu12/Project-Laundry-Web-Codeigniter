<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Tambah Barang &mdash; Mawar-Laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('/admin/barang') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Barang</h1>
          </div>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Buat Barang Baru</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('admin/barang') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input value="<?= old('nama_barang') ?>" type="text" name="nama_barang" class="form-control <?php if(!empty($validation['errors']['nama_barang'])){echo($validation['errors']['nama_barang']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['nama_barang'])){ echo $validation['errors']['nama_barang'];}?>
                        </div>
                      </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"> Save</i></button>
                        <button type="reset" class="btn btn-secondary"> Reset</button>
                      </div>
                    </form>
                </div>
              </div>
          </div>
</section>

<?= $this->endSection(); ?>