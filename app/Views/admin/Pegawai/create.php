<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Tambah pegawai &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('/admin/pegawai') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Pegawai</h1>
          </div>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Buat Pegawai Baru</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('admin/pegawai') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input value="<?= old('nama_pegawai') ?>" type="text" name="nama_pegawai" class="form-control <?php if(!empty($validation['errors']['nama_pegawai'])){echo($validation['errors']['nama_pegawai']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['nama_pegawai'])){ echo $validation['errors']['nama_pegawai'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Telephone</label>
                        <input value="<?= old('no_telp') ?>"  type="number" name="no_telp" class="form-control <?php if(!empty($validation['errors']['no_telp'])){echo($validation['errors']['no_telp']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['no_telp'])){ echo $validation['errors']['no_telp'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea name="alamat" class="form-control <?php if(!empty($validation['errors']['alamat'])){echo($validation['errors']['alamat']) ? 'is-invalid' : ''; }?>" id="info" style="height: 100px;"><?= old('alamat') ?></textarea>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['alamat'])){ echo $validation['errors']['alamat'];}?>
                        </div>
                      </div>
                      <div class="mt-2">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"> Save</i></button>
                        <button type="reset" class="btn btn-secondary"> Reset</button>
                      </div>
                    </form>
                </div>
              </div>
          </div>
</section>

<?= $this->endSection(); ?>