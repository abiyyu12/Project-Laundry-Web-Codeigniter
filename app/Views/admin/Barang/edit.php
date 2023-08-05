<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Edit Barang &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('admin/barang') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit Barang</h1>
          </div>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Edit Barang</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('admin/barang/update') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_barang" value="<?= $barang->id_barang ?>">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input value="<?= (old('nama_barang') ? old('nama_barang') : $barang->nama_barang); ?>" type="text" name="nama_barang" class="form-control <?php if(!empty($validation['errors']['nama_barang'])){echo($validation['errors']['nama_barang']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['nama_barang'])){ echo $validation['errors']['nama_barang'];}?>
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