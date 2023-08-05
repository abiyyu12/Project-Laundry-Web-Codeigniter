<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Edit Detail Transaksi Baru &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('admin/'.$detail_satuan->f_id_transaksi.'/detail-satuan') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit Detail Transaksi</h1>
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
                    <h4>Edit Detail Transaksi</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('admin/detail-satuan/update') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_transaksi" value="<?= $detail_satuan->f_id_transaksi ?>">
                      <input type="hidden" name="id_detail" value="<?= $detail_satuan->id_detail ?>">
                      <div class="form-group">
                        <label>Nama Pegawai</label>
                        <select name="pegawai" id="pegawai" value="<?= (old('pegawai')) ? $f_pegawai = old('pegawai') : $f_pegawai = $detail_satuan->f_id_pegawai ?>" class="form-control <?php if(!empty($validation['errors']['pegawai'])){echo($validation['errors']['pegawai']) ? 'is-invalid' : ''; }?>" autofocus>
                            <option disabled selected value>--Pilih Pegawai Laundry--</option>
                            <?php
                              foreach ($pegawai as $key => $value) :
                            ?>
                            <option value="<?= $value->id_pegawai ?>" <?= $f_pegawai==$value->id_pegawai ?'selected' : ''; ?>><?= $value->nama_pegawai ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['pegawai'])){ echo $validation['errors']['pegawai'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="barang" id="barang" value="<?= (old('barang')) ? $f_barang = old('barang') : $f_barang = $layanan_satuan->f_id_barang ?>" class="form-control <?php if(!empty($validation['errors']['barang'])){echo($validation['errors']['barang']) ? 'is-invalid' : ''; }?>" autofocus>
                            <option disabled selected value>--Pilih Barang Laundry--</option>
                            <?php
                              foreach ($barang as $key => $value) :
                            ?>
                            <option value="<?= $value->id_barang ?>" <?= $f_barang==$value->id_barang?'selected':'' ?>><?= $value->nama_barang ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['barang'])){ echo $validation['errors']['barang'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Layanan Laundry</label>
                        <select name="layanan" id="layanan" value="<?= (old('layanan')) ? $f_layanan = old('layanan') : $f_layanan = $layanan_satuan->layanan ?>" class="form-control <?php if(!empty($validation['errors']['layanan'])){echo($validation['errors']['layanan']) ? 'is-invalid' : ''; }?>" autofocus>
                            <option disabled selected value>--Pilih Layanan Laundry--</option>
                            <option value="laundry" <?= $f_layanan=="laundry" ? 'selected' : '' ?>>Laundry</option>
                            <option value="dry clean" <?= $f_layanan=="dry clean"  ? 'selected' : '' ?>>Dry Clean</option>
                        </select>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['layanan'])){ echo $validation['errors']['layanan'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input value="<?= (old('jml_barang') ? old('jml_barang') : $detail_satuan->jml_barang); ?>" type="number" name="jml_barang" class="form-control <?php if(!empty($validation['errors']['jml_barang'])){echo($validation['errors']['jml_barang']) ? 'is-invalid' : ''; }?>" autofocus>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['jml_barang'])){ echo $validation['errors']['jml_barang'];}?>
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