<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Tambah Detail Transaksi Baru &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('admin/'.$id_transaksi.'/detail-kiloan') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Detail Transaksi</h1>
          </div>
          <?php if(!empty($validation['error'])): ?>
                  <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">X</button>
                      <b>Errors ! </b>
                      <?= $validation['error'] ?>
                    </div>
                  </div>
          <?php endif; ?>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Buat Detail Transaksi Baru</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('admin/detail-kiloan') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                      <div class="form-group">
                        <label>Nama Pegawai</label>
                        <select name="pegawai" id="pegawai" value="<?= old('pegawai') ?>" class="form-control <?php if(!empty($validation['errors']['pegawai'])){echo($validation['errors']['pegawai']) ? 'is-invalid' : ''; }?>" autofocus>
                            <option disabled selected value>--Pilih Pegawai Laundry--</option>
                            <?php
                              foreach ($pegawai as $key => $value) :
                            ?>
                            <option value="<?= $value->id_pegawai ?>" <?= old('pegawai')==$value->id_pegawai?'selected':'' ?>><?= $value->nama_pegawai ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['pegawai'])){ echo $validation['errors']['pegawai'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Layanan Laundry</label>
                        <select name="layanan" id="layanan" value="<?= old('layanan') ?>" class="form-control <?php if(!empty($validation['errors']['layanan'])){echo($validation['errors']['layanan']) ? 'is-invalid' : ''; }?>" autofocus>
                            <option disabled selected value>--Pilih Layanan Laundry--</option>
                            <?php
                              foreach ($layanan as $key => $value) :
                            ?>
                            <option value="<?= $value->id_layanan ?>" <?= old('layanan')==$value->id_layanan?'selected':'' ?>><?= $value->nama_layanan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['layanan'])){ echo $validation['errors']['layanan'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Berat (KG)</label>
                        <input value="<?= old('kg') ?>" type="number" name="kg" class="form-control <?php if(!empty($validation['errors']['kg'])){echo($validation['errors']['kg']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['kg'])){ echo $validation['errors']['kg'];}?>
                        </div>
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"> Save</i></button>
                        <button type="reset" class="btn btn-secondary"> Reset</button>
                      </div>
                    </form>
                </div>
              </div>
          </div>
</section>

<?= $this->endSection(); ?>