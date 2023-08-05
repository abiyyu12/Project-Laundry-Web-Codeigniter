<?= $this->extend('user/templateUser') ?>
<?= $this->section('title') ?>
<title>Mawar Laundry | Web-register</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<div class="container" style="margin-top: 5rem">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
              <h5
                class="card-title text-center mb-5 fw-bold"
                style="font-size: 25px"
              >
                Sign Up
              </h5>
              <form action="<?= base_url('/register') ?>" method="post" autocomplete="off">
                <?= csrf_field() ?>
                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control <?php if(!empty($validation['errors']['nama'])){echo($validation['errors']['nama']) ? 'is-invalid' : ''; }?>"
                    id="floatingInput"
                    name="nama"
                    value="<?= old('nama') ?>"
                    placeholder="Input Nama"
                    autofocus
                  />
                  <div class="invalid-feedback">
                      <?php if(!empty($validation['errors']['nama'])){ echo $validation['errors']['nama'];}?>
                  </div>
                  <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea
                    class="form-control <?php if(!empty($validation['errors']['alamat'])){echo($validation['errors']['alamat']) ? 'is-invalid' : ''; }?>"
                    id="floatingInput"
                    name="alamat"
                    placeholder="Input Alamat"
                    autofocus
                  ><?= old('alamat') ?></textarea>
                  <div class="invalid-feedback">
                      <?php if(!empty($validation['errors']['alamat'])){ echo $validation['errors']['alamat'];}?>
                  </div>
                  <label for="floatingInput">Alamat</label>
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="number"
                    class="form-control <?php if(!empty($validation['errors']['no_telp'])){echo($validation['errors']['no_telp']) ? 'is-invalid' : ''; }?>"
                    id="floatingInput"
                    name="no_telp"
                    autofocus
                    placeholder="input Number Phone"
                    value="<?= old('no_telp') ?>"
                  />
                  <div class="invalid-feedback">
                      <?php if(!empty($validation['errors']['no_telp'])){ echo $validation['errors']['no_telp'];}?>
                  </div>
                  <label for="floatingInput">No.Telp</label>
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="email"
                    class="form-control <?php if(!empty($validation['errors']['email'])){echo($validation['errors']['email']) ? 'is-invalid' : ''; }?>"
                    id="floatingInput"
                    name="email"
                    autofocus
                    placeholder="name@example.com"
                    value="<?= old('email') ?>"
                  />
                  <div class="invalid-feedback">
                      <?php if(!empty($validation['errors']['email'])){ echo $validation['errors']['email'];}?>
                  </div>
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="password"
                    class="form-control <?php if(!empty($validation['errors']['password'])){echo($validation['errors']['password']) ? 'is-invalid' : ''; }?>"
                    id="floatingPassword"
                    name="password"
                    autofocus
                    placeholder="Password"
                  />
                  <div class="invalid-feedback">
                      <?php if(!empty($validation['errors']['password'])){ echo $validation['errors']['password'];}?>
                  </div>
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="d-grid mt-4">
                  <button
                    class="btn btn-primary btn-login text-uppercase fw-bold"
                    type="submit"
                  >
                    Sign Up
                  </button>
                  <div>
                    <p class="mt-4">
                      Sudah Punya Akun ?
                      <a href="<?= base_url('/login') ?>" class="text-black-50 fw-bold"
                        >Login</a
                      >
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>