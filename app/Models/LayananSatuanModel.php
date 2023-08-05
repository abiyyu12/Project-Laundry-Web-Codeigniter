<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananSatuanModel extends Model
{
    protected $table            = 'layanan_satuan';
    protected $primaryKey       = 'id_layanan';
    protected $returnType       = 'object';
    protected $allowedFields    = ["f_id_barang","layanan","harga"];
    public function getAllData(){
        return $this->select('layanan_satuan.id_layanan,barang.id_barang,barang.nama_barang,layanan_satuan.layanan,layanan_satuan.harga')->join('barang', 'barang.id_barang = layanan_satuan.f_id_barang','inner')->get()->getResult();
    }

    public function getDataBasedId($id_layanan)
    {
        return $this->select('layanan_satuan.id_layanan,barang.id_barang,barang.nama_barang,layanan_satuan.layanan,layanan_satuan.harga')->join('barang', 'barang.id_barang = layanan_satuan.f_id_barang','inner')->where('id_layanan',$id_layanan)->get()->getResult();
    }

    public function isMatches($id_barang = 0,$layanan = null){
        $array = ['f_id_barang' => $id_barang, 'layanan' => $layanan];
        return $this->select('layanan_satuan.id_layanan')->where($array)->get()->getResult();
    }

    
}
