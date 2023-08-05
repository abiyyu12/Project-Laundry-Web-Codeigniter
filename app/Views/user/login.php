<?= $this->extend('user/templateUser') ?>
<?= $this->section('title') ?>
<title>Mawar Laundry | Web-Login</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<div class="container" style="margin-top: 5rem">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <?php if(session()->getFlashdata('error')):
                  ?>
              <div class="mt-3" style="margin-bottom: -27px;">
                  <div class="alert alert-danger">
                    <div class="alert-body">
                      <!-- <button class="close" data-dismiss="alert">X</button> -->
                      <b>Error ! </b>
                      <?= session()->getFlashdata('error') ?>
                    </div>
                  </div>
              </div>
          <?php endif; ?>
          <?php if(session()->getFlashdata('success')):?>
              <div class="mt-3" style="margin-bottom: -27px;">
                  <div class="alert alert-success">
                    <div class="alert-body">
                      <!-- <button class="close" data-dismiss="alert">X</button> -->
                      <b>Success ! </b>
                      <?= session()->getFlashdata('success') ?>
                    </div>
                  </div>
              </div>
          <?php endif; ?>
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
              <h5
                class="card-title text-center mb-5 fw-bold"
                style="font-size: 25px"
              >
                Sign In
              </h5>
              <form action="<?= base_url('/login') ?>" method="post" autocomplete="off">
                <?= csrf_field() ?>
                <div class="form-floating mb-3">
                  <input
                    type="email"
                    class="form-control <?php if(!empty($validation['errors']['email'])){echo($validation['errors']['email']) ? 'is-invalid' : ''; }?>"
                    name="email"
                    id="floatingInput"
                    value="<?= old('email') ?>"
                    placeholder="name@example.com"
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
                    value="<?= old('password') ?>"
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
                    Sign in
                  </button>
                  <div>
                    <p class="mt-4">
                      Tidak Mempunyai Akun ?
                      <a href="<?= base_url('/register') ?>" class="text-black-50 fw-bold"
                        >Daftar</a
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