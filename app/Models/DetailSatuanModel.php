<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailSatuanModel extends Model
{
    protected $table            = 'detail_satuan';
    protected $primaryKey       = 'id_detail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['f_id_transaksi','f_id_layanan','f_id_pegawai','jml_barang'];
    public function getDetailSatuan($id_transaksi){
        $builder = $this->builder();
        $builder->select('detail_satuan.id_detail,layanan_satuan.id_layanan,layanan_satuan.layanan,layanan_satuan.harga,pegawai.nama_pegawai,detail_satuan.jml_barang,transaksi_satuan.id_transaksi')
        ->join('layanan_satuan', 'layanan_satuan.id_layanan = detail_satuan.f_id_layanan','inner')
        ->join('transaksi_satuan','transaksi_satuan.id_transaksi = detail_satuan.f_id_transaksi','inner')
        ->join('pegawai','pegawai.id_pegawai = detail_satuan.f_id_pegawai','inner')
        ->where('f_id_transaksi',$id_transaksi);
        return $builder->get()->getResultObject();
    }
}
