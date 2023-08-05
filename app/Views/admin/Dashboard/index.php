<?= $this->extend('template/default') ?>
<?= $this->section('title') ?>
<title>Home &mdash; Mawar-laundry</title>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="section-body">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-user-tie"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pegawai</h4>
                  </div>
                  <div class="card-body">
                    <?= countData('pegawai') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pelanggan</h4>
                  </div>
                  <div class="card-body">
                    <?= countData('pelanggan') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Admin</h4>
                  </div>
                  <div class="card-body">
                    <?= countData('admin') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-building"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Cabang</h4>
                  </div>
                  <div class="card-body">
                    <?= countData('cabang') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transaksi Satuan</h4>
                  </div>
                  <div class="card-body">
                    <?= countData('transaksi_satuan') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-clipboard"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transaksi Kiloan</h4>
                  </div>
                  <div class="card-body">
                    <?= countData('transaksi_kiloan') ?>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-stream"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Cucian Satuan</h4>
                  </div>
                  <div class="card-body">
                    <?php $totalCucianSatuan =  countWashSatuan() ?>
                    <?=  $totalCucianSatuan[0]['jumlahCucian'] != null ? $totalCucianSatuan[0]['jumlahCucian'] : '0' ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-tshirt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Berat Cucian</h4>
                  </div>
                  <div class="card-body">
                    <?php $totalCucianKiloan =  countWashKiloan() ?>
                    <?=  $totalCucianKiloan[0]['jumlahCucian'] != null ? $totalCucianKiloan[0]['jumlahCucian'].'kg' : '0Kg' ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <?php
            $transaksi = getDateTransaksi('transaksi_satuan');
            $labelTransaksi = null;
            $valueTransaksi = null;
            foreach($transaksi as $t){
              $labelTransaksi[] = $t['tgl_transaksi'];
              $valueTransaksi[] = $t['jumlah'];
            }
            if(!empty($labelTransaksi)){ 
            ?>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Transaksi Satuan 7 Hari Sebelumnya</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="chartTransaksi"></canvas>
                  </div>
                </div>
            </div>
            <?php } ?>
          <?php
            $transaksiKiloan = getDateTransaksi('transaksi_kiloan');
            $labelTransaksiKiloan = null;
            $valueTransaksiKiloan = null;
            foreach($transaksiKiloan as $t){
              $labelTransaksiKiloan[] = $t['tgl_transaksi'];
              $valueTransaksiKiloan[] = $t['jumlah'];
            }
            if(!empty($labelTransaksiKiloan)){ 
            ?>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Transaksi Kiloan 7 Hari Sebelumnya</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="chartTransaksi2"></canvas>
                  </div>
                </div>
            </div>
            <?php } ?>
          </div>
          </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('chart') ?>
<script>
  var ctx = document.getElementById("chartTransaksi").getContext("2d");
  var myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: <?= json_encode($labelTransaksi) ?>,
    datasets: [
      {
        label: "Statistics",
        data: <?= json_encode($valueTransaksi) ?>,
        borderWidth: 2,
        backgroundColor: "#6777ef",
        borderColor: "#6777ef",
        borderWidth: 2.5,
        pointBackgroundColor: "#ffffff",
        pointRadius: 4,
      },
    ],
  },
  options: {
    legend: {
      display: false,
    },
    scales: {
      yAxes: [
        {
          gridLines: {
            drawBorder: false,
            color: "#f2f2f2",
          },
          ticks: {
            beginAtZero: true,
            stepSize: 150,
          },
        },
      ],
      xAxes: [
        {
          ticks: {
            display: false,
          },
          gridLines: {
            display: false,
          },
        },
      ],
    },
  },
});

  var ctx = document.getElementById("chartTransaksi2").getContext("2d");
  var myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: <?= json_encode($labelTransaksiKiloan) ?>,
    datasets: [
      {
        label: "Statistics",
        data: <?= json_encode($valueTransaksiKiloan) ?>,
        borderWidth: 2,
        backgroundColor: "#6777ef",
        borderColor: "#6777ef",
        borderWidth: 2.5,
        pointBackgroundColor: "#ffffff",
        pointRadius: 4,
      },
    ],
  },
  options: {
    legend: {
      display: false,
    },
    scales: {
      yAxes: [
        {
          gridLines: {
            drawBorder: false,
            color: "#f2f2f2",
          },
          ticks: {
            beginAtZero: true,
            stepSize: 150,
          },
        },
      ],
      xAxes: [
        {
          ticks: {
            display: false,
          },
          gridLines: {
            display: false,
          },
        },
      ],
    },
  },
});
</script>
<?= $this->endSection(); ?>