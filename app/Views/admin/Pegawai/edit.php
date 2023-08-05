<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Edit Pegawai &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('admin/pegawai') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit Pegawai</h1>
          </div>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Edit Pegawai</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('admin/pegawai/update') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_pegawai" value="<?= $pegawai->id_pegawai ?>">
                      <div class="form-group">
                        <label>Nama Kasir</label>
                        <input value="<?= (old('nama_pegawai') ? old('nama_pegawai') : $pegawai->nama_pegawai); ?>" type="text" name="nama_pegawai" class="form-control <?php if(!empty($validation['errors']['nama_pegawai'])){echo($validation['errors']['nama_pegawai']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['nama_pegawai'])){ echo $validation['errors']['nama_pegawai'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Telephone</label>
                        <input value="<?= (old('no_telp') ? old('no_telp') : $pegawai->no_telp); ?>"  type="number" name="no_telp" class="form-control <?php if(!empty($validation['errors']['no_telp'])){echo($validation['errors']['no_telp']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['no_telp'])){ echo $validation['errors']['no_telp'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea name="alamat" class="form-control <?php if(!empty($validation['errors']['alamat'])){echo($validation['errors']['alamat']) ? 'is-invalid' : ''; }?>" id="info" style="height: 100px;"><?= (old('alamat') ? old('alamat') : $pegawai->alamat); ?></textarea>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['alamat'])){ echo $validation['errors']['alamat'];}?>
                        </div>
                      </div>
                      <div class="mt-2">
                        <button type="submit" class="btn btn-warning"><i class="fas fa-paper-plane"> Save</i></button>
                        <button type="reset" class="btn btn-secondary"> Reset</button>
                      </div>
                    </form>
                </div>
              </div>
          </div>
</section>

<?= $this->endSection(); ?>