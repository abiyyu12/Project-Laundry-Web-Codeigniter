<?= $this->extend('user/templateUser') ?>
<?= $this->section('title') ?>
<title>Mawar Laundry | detail-kiloan</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- Contnent -->
<div class="card" style="margin-top: 3rem;">
  <div class="card-body" style="background-color: #ececec;">
    <div class="container mb-5 mt-5">
      <div class="row d-flex">
      </div>
      <div class="container" style="background-color: #fff;">
        <div class="col-md-12 mb-3">
          <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #LK-<?= $transaksi->id_transaksi ?></strong></p>
          <hr>
        </div>
        <div class="col-md-12">
          <div class="text-center">
            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
            <p class="pt-0">MawarLaundry.com</p>
          </div>
        </div>
        <div class="row" style="background-color: #fff;">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-muted">Kpd : <span style="color:#5d9fc5 ;"><?=$pelanggan->nama_pelanggan ?></span></li>
              <li class="text-muted"><?= $pelanggan->alamat_pelanggan ?></li>
              <li class="text-muted"><i class="fas fa-phone"></i> <?= $pelanggan->no_telp ?></li>
            </ul>
          </div>
          <div class="col-xl-4">
            <p class="text-muted">Invoice</p>
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">ID:#LK-</span><?= $transaksi->id_transaksi ?></li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">Tanggal Transaksi : </span><?= date('d F Y',strtotime($transaksi->tgl_transaksi)) ?></li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="me-1 fw-bold">Status:</span>
                  <?php if($transaksi->status == "selesai") :  ?>
                    <span class="badge bg-success text-white fw-bold">Selesai</span></li>
                  <?php endif; ?>
                  <?php if($transaksi->status == "proses") :  ?>
                    <span class="badge bg-warning text-white fw-bold">Proses</span></li>
                  <?php endif; ?>
                  <?php if($transaksi->status == "pengiriman") :  ?>
                    <span class="badge bg-primary text-white fw-bold">Pengiriman</span></li>
                  <?php endif; ?>
                  <?php if($transaksi->status == "batal") :  ?>
                    <span class="badge bg-danger text-white fw-bold">Batal</span></li>
                  <?php endif; ?>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead style="background-color:#84B0CA ;" class="text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Jenis Layanan</th>
                <th scope="col">Berat (KG)</th>
                <th scope="col">Harga</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php  foreach ($details as $key => $value) : ?>
              <tr>
                <th scope="row"><?= $key+1 ?></th>
                <td><?= $value->nama_layanan ?></td>
                <td><?= $value->kg ?></td>
                <td><?= "Rp." . number_format($value->harga,0,',','.');?></td>
                <td><?=  "Rp." . number_format($value->harga * $value->kg,0,',','.'); ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-xl-8">
            <p class="ms-3">Berikut adalah nota transaksi serta informasi pembayaran anda</p>

          </div>
          <div class="col-xl-3">
            <p class="text-black float-start"><span class="text-black me-3"> Total Harga</span><span
                style="font-size: 25px;"><?= "Rp." . number_format($transaksi->total_harga,2,',','.'); ?></span></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
            <a href="<?= base_url('/laundry-kiloan') ?>" class="btn btn-md btn-primary border-0 mb-3" style="background-color:#60bdf3 ;"><i data-feather="arrow-left"></i>Kembali</a>
          </div>
          <div class="col-xl-2">
            <form action="/export-kiloan" method="post">
            <input type="hidden" name="id_transaksi" value="<?= $transaksi->id_transaksi ?>">
            <button type="submit" class="btn btn-primary text-capitalize"
              style="background-color:#60bdf3 ;"><i data-feather="printer"></i> Print</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>