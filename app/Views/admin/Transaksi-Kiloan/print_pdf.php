<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Export-PDF | Transaksi-Kiloan</title>
  <style>
    @page{
      margin: 15px;
    }
    .border-table{
      font-family: Arial, Helvetica, sans-serif;
      width: 100%;
      border-collapse: collapse;
      font-size: 12px;
    }
    .border-table th{
      border: 1 solid #000;
      font-weight: bold;
      background-color: #fcf80d;
    }
    .border-table td{
      border: 1 solid #000;
    }
  </style>
</head>
<body>
  <center>
  <h3>Transaksi Kiloan Mawar-laundry</h3>
  </center>
  <table class="border-table">
   <thead>
        <tr>
          <th>No</th>
          <th>Nama Pelanggan</th>
          <th>Nama Kasir</th>
          <th>Pemilik Cabang</th>
          <th>Tgl-Transaksi</th>
          <th>Tgl-Pengambilan</th>
          <th>Tgl-Selesai</th>
          <th>TotalHarga</th>
          <th>Status</th>
        </tr>
          </thead>
            <tbody>
              <?php
                foreach($TransaksiKiloan as $key => $value) : ?>
                  <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $value->nama_pelanggan ?></td>
                    <td><?= $value->nama_admin!=null ? $value->nama_admin : 'Online' ?></td>
                    <td><?= $value->nama_pemilik!=null ? $value->nama_pemilik : 'Pusat' ?></td>
                    <td><?= date('d/m/y',strtotime($value->tgl_transaksi)) ?></td>
                    <td><?= $value->tgl_pengambilan=="0000-00-00" ? "00/00/00" :date('d/m/y',strtotime($value->tgl_pengambilan)) ?></td>
                    <td><?= $value->tgl_selesai=="0000-00-00" ? "00/00/00" :date('d/m/y',strtotime($value->tgl_selesai)) ?></td>
                    <td><?= 'Rp.'.number_format($value->total_harga,0,',','.'); ?></td>
                    <td><?= $value->status ?></td>
                      <?php endforeach; ?>
                  </tr>
          </tbody>
    </table>
</body>
</html>