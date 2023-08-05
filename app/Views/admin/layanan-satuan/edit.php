<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Edit Layanan Satuan &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('admin/layanan-satuan') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit Layanan Satuan</h1>
          </div>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Edit Layanan Satuan</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('admin/layanan-satuan/update') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_layanan" value="<?= $layanan_satuan->id_layanan ?>">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <select value="<?= (old('id_barang')) ? $f_barang = old('id_barang') : $f_barang = $layanan_satuan->f_id_barang  ?>" name="id_barang" class="form-control <?php if(!empty($validation['errors']['id_barang'])){echo($validation['errors']['id_barang']) ? 'is-invalid' : ''; }?>" id="id_barang" autofocus>
                            <option disabled selected value>--Pilih Barang--</option>
                            <?php
                              foreach ($barang as $key => $value) :
                            ?>
                            <option value="<?= $value->id_barang ?>" <?= $f_barang==$value->id_barang ?'selected' : ''; ?>><?= $value->nama_barang ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['id_barang'])){ echo $validation['errors']['id_barang'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Layanan</label>
                        <select name="layanan" id="layanan" value="<?= (old('layanan')) ? $s_layanan = old('layanan') : $s_layanan = $layanan_satuan->layanan ?>" class="form-control <?php if(!empty($validation['errors']['layanan'])){echo($validation['errors']['layanan']) ? 'is-invalid' : ''; }?>">
                          <option disabled selected value>--Pilih Layanan--</option>
                          <option value="laundry" <?= $s_layanan == "laundry" ? 'selected' : '' ?>>Laundry</option>
                          <option value="dry clean" <?= $s_layanan == "dry clean" ? 'selected' : '' ?>>Dry Clean</option>
                        </select>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['layanan'])){ echo $validation['errors']['layanan'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control <?php if(!empty($validation['errors']['harga'])){echo($validation['errors']['harga']) ? 'is-invalid' : ''; }?>" value="<?= (old('harga') ? old('harga') : $layanan_satuan->harga); ?>">
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['harga'])){ echo $validation['errors']['harga'];}?>
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