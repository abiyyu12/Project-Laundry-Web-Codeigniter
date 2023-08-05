<?php 
   function adminLogin(){
    $db = \Config\Database::connect();
    return $db->table('admin')->where('id_admin',session('id_admin'))->get()->getRow();
  }
  function countData($table){
    $db = \Config\Database::connect();
    return $db->table($table)->countAllResults();
  }

  function countWashSatuan(){
    $array = ['status' => 'proses', 'tgl_transaksi' => date('y-m-d')];
    $db = \Config\Database::connect();
    $countWash = $db->table('detail_satuan');
    $countWash->select('SUM(detail_satuan.jml_barang) AS jumlahCucian')->join('transaksi_satuan','transaksi_satuan.id_transaksi = detail_satuan.f_id_transaksi','inner')->where($array);
    $result = $countWash->get();
    return $result->getResultArray();
  }
  function countWashKiloan(){
    $array = ['status' => 'proses', 'tgl_transaksi' => date('y-m-d')];
    $db = \Config\Database::connect();
    $countWash = $db->table('detail_kiloan');
    $countWash->select('SUM(detail_kiloan.kg) AS jumlahCucian')->join('transaksi_kiloan','transaksi_kiloan.id_transaksi = detail_kiloan.f_id_transaksi','inner')->where($array);
    $result = $countWash->get();
    return $result->getResultArray();
  }

  function getDateTransaksi($transaksi){
    $db = \Config\Database::connect();
    $transaksi = $db->table($transaksi);
    $transaksi->select('tgl_transaksi, COUNT("tgl_transaksi") AS jumlah')->where('tgl_transaksi BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()');
    $transaksi->groupBy('tgl_transaksi');
    $result = $transaksi->get();
    return $result->getResultArray();
  }

  function getTransactionCondition($cond,$table){
    $array = ['status' => $cond, 'tgl_transaksi' => date('y-m-d')];
    $db = \Config\Database::connect();
    $transaction = $db->table($table);
    $transaction->select('COUNT("status") AS jumlah')->where($array)->groupBy('status');
    $result = $transaction->get();
    $tr = $result->getResultArray();
    if(!empty($tr)){
      return $tr[0]['jumlah'];
    }else{
      return 0;
    }
  }
?>