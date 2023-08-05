<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mawar Laundry | print-satuan</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;1,800&display=swap"
      rel="stylesheet"
    />
    <!-- Bootsrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url('/my-assets/style.css') ?>" />
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  </head>
  <body background="white">
  <div class="card" style="margin-top: 3rem;">
  <div class="card-body" style="background-color: #fff;">
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
                <th scope="col">Nama Barang</th>
                <th scope="col">Jenis Layanan</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php  foreach ($details as $key => $value) : ?>
              <tr>
                <th scope="row"><?= $key+1 ?></th>
                <?php foreach ($baju as $b) :  ?>
                  <td><?= $b->nama_barang ?></td>
                <?php endforeach; ?>
                <td><?= $value->layanan ?></td>
                <td><?= $value->jml_barang ?></td>
                <td><?= "Rp." . number_format($value->harga,0,',','.');?></td>
                <td><?= "Rp." . number_format($value->harga * $value->jml_barang,0,',','.'); ?></td>
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
        </div>
        </div>
      </div>
    </div>
    <script>
      window.print();
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>