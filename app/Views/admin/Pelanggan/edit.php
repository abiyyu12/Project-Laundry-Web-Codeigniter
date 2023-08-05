<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Edit Pelanggan &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('/admin/pelanggan') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit Pelanggan</h1>
          </div>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Edit Pelanggan</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('/admin/pelanggan/update') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_pelanggan" value="<?= $pelanggan->id_pelanggan ?>">
                      <input type="hidden" name="prev_pass" value="<?= $pelanggan->password ?>">
                      <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input value="<?= (old('nama_pelanggan') ? old('nama_pelanggan') : $pelanggan->nama_pelanggan); ?>" type="text" name="nama_pelanggan" class="form-control <?php if(!empty($validation['errors']['nama_pelanggan'])){echo($validation['errors']['nama_pelanggan']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['nama_pelanggan'])){ echo $validation['errors']['nama_pelanggan'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Telephone</label>
                        <input value="<?= (old('no_telp') ? old('no_telp') : $pelanggan->no_telp); ?>"  type="number" name="no_telp" class="form-control <?php if(!empty($validation['errors']['no_telp'])){echo($validation['errors']['no_telp']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['no_telp'])){ echo $validation['errors']['no_telp'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea name="alamat_pelanggan" class="form-control <?php if(!empty($validation['errors']['alamat_pelanggan'])){echo($validation['errors']['alamat_pelanggan']) ? 'is-invalid' : ''; }?>" style="height: 100px;"><?= (old('alamat_pelanggan') ? old('alamat_pelanggan') : $pelanggan->alamat_pelanggan); ?></textarea>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['alamat_pelanggan'])){ echo $validation['errors']['alamat_pelanggan'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input value="<?= (old('email') ? old('email') : $pelanggan->email); ?>" type="email" name="email" id="email" class="form-control" autofocus>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input value="<?= (old('password') ? old('password') : $pelanggan->password); ?>" type="password" name="password" id="password" class="form-control" autofocus>
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