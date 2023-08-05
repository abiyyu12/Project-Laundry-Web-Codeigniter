<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Edit Layanan-Kiloan &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('/admin/layanan-kiloan') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit Layanan-Kiloan</h1>
          </div>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Ubah Layanan-Kiloan</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('admin/layanan-kiloan/update') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_layanan" value="<?= $layanan_kiloan->id_layanan ?>">
                      <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" name="nm_layanan" id="nm_layanan" class="form-control <?php if(!empty($validation['errors']['nm_layanan'])){echo($validation['errors']['nm_layanan']) ? 'is-invalid' : ''; }?>" value="<?= (old('nm_layanan') ? old('nm_layanan') : $layanan_kiloan->nama_layanan); ?>">
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['nm_layanan'])){ echo $validation['errors']['nm_layanan'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control <?php if(!empty($validation['errors']['harga'])){echo($validation['errors']['harga']) ? 'is-invalid' : ''; }?>" value="<?= (old('harga') ? old('harga') : $layanan_kiloan->harga); ?>">
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['harga'])){ echo $validation['errors']['harga'];}?>
                        </div>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"> Save</i></button>
                        <button type="reset" class="btn btn-secondary"> Reset</button>
                      </div>
                    </form>
                </div>
              </div>
          </div>
</section>
<?= $this->endSection(); ?>