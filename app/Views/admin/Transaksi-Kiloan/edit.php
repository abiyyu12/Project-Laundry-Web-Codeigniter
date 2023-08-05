<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Edit Transaksi Kiloan &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?= base_url('/admin/transaksi-kiloan') ?>" class="btn"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit Transaksi Kiloan</h1>
          </div>
          <div class="section-body">
              <div class="card">
                <div class="card-header">
                    <h4>Ubah Transkasi Kiloan</h4>
                </div>
                <div class="card-body col-md-8">
                    <form action="<?= base_url('/admin/transaksi-kiloan/update') ?>" method="post" autocomplete="off">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_transaksi" value="<?= $transaksi_kiloan->id_transaksi ?>">
                      <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <select value="<?= (old('id_pelanggan')) ? $f_pelanggan = old('id_pelanggan') : $f_pelanggan = $transaksi_kiloan->f_id_pelanggan  ?>" name="id_pelanggan" class="form-control <?php if(!empty($validation['errors']['id_pelanggan'])){echo($validation['errors']['id_pelanggan']) ? 'is-invalid' : ''; }?>" id="id_pelanggan" autofocus>
                            <option disabled selected value>--Pilih Pelanggan--</option>
                            <?php
                              foreach ($pelanggan as $key => $value) :
                            ?>
                            <option value="<?= $value->id_pelanggan ?>" <?= $f_pelanggan==$value->id_pelanggan ?'selected' : ''; ?>><?= $value->nama_pelanggan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          <?php if(!empty($validation['errors']['id_pelanggan'])){ echo $validation['errors']['id_pelanggan'];}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Nama Admin</label>
                        <select value="<?= (old('id_admin')) ? $f_kasir = old('id_admin') : $f_admin = $transaksi_kiloan->f_id_admin  ?>" name="id_admin" class="form-control" id="id_admin" autofocus>
                            <option disabled selected value>--Pilih Kasir--</option>
                            <option value="online" <?= $f_admin==null ?'selected': ''?>>Online</option>
                            <?php
                              foreach ($admin as $key => $value) :
                            ?>
                            <option value="<?= $value->id_admin ?>"<?= $f_admin==$value->id_admin ?'selected' : ''; ?>><?= $value->nama_admin ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Pemilik Cabang</label>
                        <select value="<?= (old('id_cabang')) ? $f_cabang = old('id_cabang') : $f_cabang = $transaksi_kiloan->f_id_cabang  ?>" name="id_cabang" class="form-control" id="id_cabang" autofocus>
                            <option disabled selected value>--Pilih Pemilik Cabang--</option>
                            <option value="pusat" <?= $f_cabang==null ?'selected': ''?>>Pusat</option>
                            <?php
                              foreach ($cabang as $key => $value) :
                            ?>
                            <option value="<?= $value->id_cabang ?>"<?= $f_cabang==$value->id_cabang ?'selected' : ''; ?>><?= $value->nama_pemilik ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Pengambilan</label>
                        <input type="date" name="tgl_pengambilan" id="tgl_pengambilan" class="form-control" value="<?= (old('tgl_pengambilan') ? old('tgl_pengambilan') : $transaksi_kiloan->tgl_pengambilan); ?>">
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <select value="<?= (old('id_cabang')) ? $f_status = old('id_status') : $f_status = $transaksi_kiloan->status  ?>" name="status" class="form-control <?php if(!empty($validation['errors']['status'])){echo($validation['errors']['status']) ? 'is-invalid' : ''; }?>" id="status" autofocus>
                            <option disabled selected value>--Pilih Status Transaksi--</option>
                            <option value="selesai" <?= $f_status=="selesai" ? 'selected' : '' ?>>Selesai</option>
                            <option value="proses" <?= $f_status=="proses" ? 'selected' : '' ?>>Proses</option>
                            <option value="pengiriman" <?= $f_status=="pengiriman" ? 'selected' : '' ?>>Pengiriman</option>
                            <option value="batal" <?= $f_status=="batal" ? 'selected' : '' ?>>Batal</option>
                        </select>
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