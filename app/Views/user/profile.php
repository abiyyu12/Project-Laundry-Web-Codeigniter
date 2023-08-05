<?= $this->extend('user/templateUser') ?>
<?= $this->section('title') ?>
<title>Mawar Laundry | Profle</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- Contnent -->
<div class="container rounded mb-5" style="margin-top: 6rem;">
    <div class="row justify-content-center">
        <div class="col-md-3 border-right bg-white">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?=base_url()?>/stisla-master/assets/img/avatar/avatar-1.png"><span class="font-weight-bold"><?= $pelanggan->nama_pelanggan ?></span><span class="text-black-50"><?= $pelanggan->email; ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right bg-white">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                  <?php 
                    if(session()->getFlashdata('success')):
                  ?>
                    <div class="col-md-12 alert alert-success alert-dismissible fade show" style="font-size: 14px;" role="alert">
                      <strong>Notif : </strong> Profile berhasil diubah.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <form action="<?= base_url('/profile') ?>" method="post" autocomplete="off">
                    <input type="hidden" name="id_pelanggan" value="<?= $pelanggan->id_pelanggan ?>">
                    <input type="hidden" name="prev_pass" value="<?= $pelanggan->password ?>">
                    <div class="col-md-12"><label class="labels">Nama</label><input type="text" name="nama_pelanggan" class="form-control <?php if(!empty($validation['errors']['nama_pelanggan'])){echo($validation['errors']['nama_pelanggan']) ? 'is-invalid' : ''; }?>" placeholder="nama anda" value="<?= (old('nama_pelanggan') ? old('nama_pelanggan') : $pelanggan->nama_pelanggan); ?>">
                    <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['nama_pelanggan'])){ echo $validation['errors']['nama_pelanggan'];}?>
                    </div></div>
                    <div class="col-md-12"><label class="labels">No Telepon</label><input type="text" name="no_telp" class="form-control <?php if(!empty($validation['errors']['no_telp'])){echo($validation['errors']['no_telp']) ? 'is-invalid' : ''; }?>" placeholder="no telepon aktif" value="<?= (old('no_telp') ? old('no_telp') : $pelanggan->no_telp); ?>">
                    <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['no_telp'])){ echo $validation['errors']['no_telp'];}?>
                    </div>
                    </div>
                    <div class="col-md-12"><label class="labels">Alamat</label><textarea class="form-control <?php if(!empty($validation['errors']['alamat_pelanggan'])){echo($validation['errors']['alamat_pelanggan']) ? 'is-invalid' : ''; }?>" name="alamat_pelanggan" placeholder="alamat rumah"><?= (old('alamat_pelanggan') ? old('alamat_pelanggan') : $pelanggan->alamat_pelanggan); ?></textarea>
                    <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['alamat_pelanggan'])){ echo $validation['errors']['alamat_pelanggan'];}?>
                    </div>
                    </div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" name="password"  class="form-control <?php if(!empty($validation['errors']['password'])){echo($validation['errors']['password']) ? 'is-invalid' : ''; }?>" placeholder="password baru" value="<?= (old('password') ? old('password') : $pelanggan->password); ?>">
                    <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['password'])){ echo $validation['errors']['password'];}?>
                    </div>
                    </div>
                </div>
                <div class="mt-4 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>