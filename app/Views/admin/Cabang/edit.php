<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Edit Cabang &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('admin/cabang') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit Cabang</h1>
          </div>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Edit Cabang</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('admin/cabang/update') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_cabang" value="<?= $cabang->id_cabang ?>">
                      <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input value="<?= (old('nama_pemilik') ? old('nama_pemilik') : $cabang->nama_pemilik); ?>" type="text" name="nama_pemilik" class="form-control <?php if(!empty($validation['errors']['nama_pemilik'])){echo($validation['errors']['nama_pemilik']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['nama_pemilik'])){ echo $validation['errors']['nama_pemilik'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Telephone</label>
                        <input value="<?= (old('no_telp') ? old('no_telp') : $cabang->no_telp); ?>"  type="number" name="no_telp" class="form-control <?php if(!empty($validation['errors']['no_telp'])){echo($validation['errors']['no_telp']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['no_telp'])){ echo $validation['errors']['no_telp'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea name="alamat_cabang" class="form-control <?php if(!empty($validation['errors']['alamat_cabang'])){echo($validation['errors']['alamat_cabang']) ? 'is-invalid' : ''; }?>" id="info" style="height: 100px;"><?= (old('alamat_cabang') ? old('alamat_cabang') : $cabang->alamat_cabang); ?></textarea>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['alamat_cabang'])){ echo $validation['errors']['alamat_cabang'];}?>
                        </div>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-warning"><i class="fas fa-paper-plane"> Save</i></button>
                        <button type="reset" class="btn btn-secondary"> Reset</button>
                      </div>
                    </form>
                </div>
              </div>
          </div>
</section>

<?= $this->endSection(); ?>