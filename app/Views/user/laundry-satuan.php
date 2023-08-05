<?= $this->extend('user/templateUser') ?>
<?= $this->section('title') ?>
<title>Mawar Laundry | laundry-satuan</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- Contnent -->
<div class="container" style="margin-top: 5rem; color: white">
      <button
        type="button"
        class="btn btn-primary mb-3"
        data-bs-toggle="modal"
        data-bs-target="#staticBackdrop"
      >
        PESAN JASA
        <i data-feather="send"></i>
      </button>
      <div
        class="modal fade"
        id="staticBackdrop"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog text-black">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Info</h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form action="<?= base_url('/laundry-satuan') ?>" method="post">
              <div class="modal-body">
                Anda yakin memesan jasa ini?,Kurir akan segera datang ke alamat
                anda dan akan mencatat semua cucian serta layanan yang anda minta,jika anda menyetujui.
                <input type="hidden" name="id_user" value="<?= session()->get('id_user'); ?>" />
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  BATAL
                </button>
                <button type="submit" class="btn btn-primary">
                  PESAN JASA
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Cards -->
      <div class="row" style="<?= count($transaksi) > 2 ? 'height: auto;':'height: 70vh;' ?>">
        <?php if(empty($transaksi)): ?>
          <div class="col-lg-12" style="color: #adb5bd;margin: auto auto;text-align: center;">
            <h4>Anda belum pernah melakukan transaksi laundry satuan</h4>
          </div>
        <?php endif; ?>
        <?php foreach ($transaksi as $key => $value) : ?>
        <div class="col-lg-6">
          <div class="card mb-4 bg-white text-light text-black">
            <h5 class="card-header">Nomor Laundry : <?= 'LS'.$value->id_transaksi ?></h5>
            <div class="card-body">
              <h5 class="card-title">Tanggal Laundry : <?= date('d F Y',strtotime($value->tgl_transaksi)) ?></h5>
              <?php if($value->status == 'proses') : ?>
                <div class="alert alert-warning" style="max-width: 600px">
                  Status : Cucian anda dalam proses.
                </div>
              <?php endif; ?>
              <?php if($value->status == 'selesai') : ?>
                <div class="alert alert-success" style="max-width: 600px">
                  Status : Transaksi anda sudah selesai.
                </div>
              <?php endif; ?>
              <?php if($value->status == 'batal') : ?>
                <div class="alert alert-danger" style="max-width: 600px">
                  Status : Transaksi telah dibatalkan.
                </div>
              <?php endif; ?>
              <?php if($value->status == 'pengiriman') : ?>
                <div class="alert alert-primary" style="max-width: 600px">
                  Status : Cucian anda dalam pengiriman.
                </div>
              <?php endif; ?>
              <a href="<?= base_url('/'.$value->id_transaksi.'/detail-satuan') ?>" class="btn btn-info"
                >DETAIL LAUNDRY</a
              >
            </div>
          </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>