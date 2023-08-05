<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Tambah Transaksi Kiloan &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('/admin/transaksi-kiloan') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Transaksi Kiloan</h1>
          </div>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Buat Transkasi Kiloan Baru</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('/admin/transaksi-kiloan') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <select value="<?= old('id_pelanggan') ?>" name="id_pelanggan" class="form-control <?php if(!empty($validation['errors']['id_pelanggan'])){echo($validation['errors']['id_pelanggan']) ? 'is-invalid' : ''; }?>" id="id_pelanggan" autofocus>
                            <option disabled selected value>--Pilih Pelanggan--</option>
                            <?php
                              foreach ($pelanggan as $key => $value) :
                            ?>
                            <option value="<?= $value->id_pelanggan ?>" <?= old('id_pelanggan')==$value->id_pelanggan ?'selected' : ''; ?>><?= $value->nama_pelanggan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['id_pelanggan'])){ echo $validation['errors']['id_pelanggan'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Pemilik Cabang</label>
                        <select value="<?= old('id_cabang') ?>" name="id_cabang" class="form-control" id="id_cabang" autofocus>
                            <option disabled selected value>--Pilih Pemilik Cabang--</option>
                            <option value="pusat">Pusat</option>
                            <?php
                              foreach ($cabang as $key => $value) :
                            ?>
                            <option value="<?= $value->id_cabang ?>" <?= old('id_cabang')==$value->id_cabang ?'selected' : ''; ?>><?= $value->nama_pemilik ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Pengambilan</label>
                        <input type="date" name="tgl_pengambilan" id="tgl_pengambilan" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <select value="<?= old('id_cabang') ?>" name="status" class="form-control <?php if(!empty($validation['errors']['status'])){echo($validation['errors']['status']) ? 'is-invalid' : ''; }?>" id="status" autofocus>
                            <option disabled selected value>--Pilih Status Transaksi--</option>
                            <option value="selesai">Selesai</option>
                            <option value="proses">Proses</option>
                            <option value="pengiriman">Pengiriman</option>
                            <option value="batal">Batal</option>
                        </select>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['status'])){ echo $validation['errors']['status'];}?>
                        </div>
                      </div>
                      <div class="mt-2">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"> Save</i></button>
                        <button type="reset" class="btn btn-secondary"> Reset</button>
                      </div>
                    </form>
                </div>
              </div>
          </div>
</section>

<?= $this->endSection(); ?>