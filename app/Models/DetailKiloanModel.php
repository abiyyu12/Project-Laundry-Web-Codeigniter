<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailKiloanModel extends Model
{
    protected $table            = 'detail_kiloan';
    protected $primaryKey       = 'id_detail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['f_id_transaksi','f_id_layanan','f_id_pegawai','kg'];
    public function getDetailKiloan($id_transaksi){
        $builder = $this->builder();
        $builder->select('detail_kiloan.id_detail,layanan_kiloan.id_layanan,layanan_kiloan.nama_layanan,layanan_kiloan.harga,pegawai.nama_pegawai,detail_kiloan.kg,transaksi_kiloan.id_transaksi')
        ->join('layanan_kiloan', 'layanan_kiloan.id_layanan = detail_kiloan.f_id_layanan','inner')
        ->join('transaksi_kiloan','transaksi_kiloan.id_transaksi = detail_kiloan.f_id_transaksi','inner')
        ->join('pegawai','pegawai.id_pegawai = detail_kiloan.f_id_pegawai','inner')
        ->where('f_id_transaksi',$id_transaksi);
        return $builder->get()->getResultObject();
    }
}
