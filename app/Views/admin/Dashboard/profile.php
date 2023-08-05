<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Home Profile &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
<div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
          <?php if(session()->getFlashdata('success')):?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">X</button>
                      <b>Success ! </b>
                      <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php endif; ?>
            <h2 class="section-title"><?= $admin->nama_admin ?></h2>
            <p class="section-lead">
              Ubah Informasi tentang anda sebagai admin Mawar-laundry disini
            </p>
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" class="needs-validation" autocomplete="off" action="<?= base_url('admin/profile') ?>">
                    <div class="card-header d-block">
                      <h4 class="mt-2 mb-2">Edit Profile</h4>
                      <img width="100" alt="image" src="<?= base_url('/stisla-master/assets/img/avatar/avatar-1.png') ?>" class="rounded-circle profile-widget-picture">
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Admin Name</label>
                            <input name="nama_admin" type="text" class="form-control <?php if(!empty($validation['errors']['nama_admin'])){echo($validation['errors']['nama_admin']) ? 'is-invalid' : ''; }?>" value="<?= (old('nama_admin') ? old('nama_admin') : $admin->nama_admin); ?>" autofocus>
                            <div class="invalid-feedback">
                              <?php if(!empty($validation['errors']['nama_admin'])){ echo $validation['errors']['nama_admin'];}?>
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Phone Number</label>
                            <input name="no_telp" type="text" class="form-control <?php if(!empty($validation['errors']['no_telp'])){echo($validation['errors']['no_telp']) ? 'is-invalid' : ''; }?>" value="<?= (old('no_telp') ? old('no_telp') : $admin->no_telp); ?>" autofocus>
                            <div class="invalid-feedback">
                              <?php if(!empty($validation['errors']['no_telp'])){ echo $validation['errors']['no_telp'];}?>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Username</label>
                            <input name="username" type="text" class="form-control <?php if(!empty($validation['errors']['username'])){echo($validation['errors']['username']) ? 'is-invalid' : ''; }?>" value="<?= (old('username') ? old('username') : $admin->username); ?>" autofocus>
                            <div class="invalid-feedback">
                              <?php if(!empty($validation['errors']['username'])){ echo $validation['errors']['username'];}?>
                            </div>
                          </div>
                          <input type="hidden" name="passLama" value="<?= $admin->password ?>" autofocus>
                          <div class="form-group col-md-6 col-12">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control <?php if(!empty($validation['errors']['password'])){echo($validation['errors']['password']) ? 'is-invalid' : ''; }?>" value="<?= (old('password') ? old('password') : $admin->password); ?>">
                            <div class="invalid-feedback">
                              <?php if(!empty($validation['errors']['password'])){ echo $validation['errors']['password'];}?>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control <?php if(!empty($validation['errors']['alamat'])){echo($validation['errors']['alamat']) ? 'is-invalid' : ''; }?>" id="info" style="height: 100px;"><?= (old('alamat') ? old('alamat') : $admin->alamat); ?></textarea>
                            <div class="invalid-feedback">
                              <?php if(!empty($validation['errors']['alamat'])){ echo $validation['errors']['alamat'];}?>
                            </div>
                          </div>
                        </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit" value="submit" name="submit">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
</section>

<?= $this->endSection(); ?>