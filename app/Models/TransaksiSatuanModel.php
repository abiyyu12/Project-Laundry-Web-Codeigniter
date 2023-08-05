<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiSatuanModel extends Model
{
    protected $table            = 'transaksi_satuan';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['f_id_pelanggan','f_id_admin','f_id_cabang','tgl_transaksi','tgl_pengambilan','status','tgl_selesai','total_harga'];

    public function getOrders($nb_page) {
        return $this->select('orders.id,customers.nama,customers.address,orders.namaBarang,orders.jumlah,orders.harga')->join('customers', 'customers.id = orders.c_id','inner')->paginate($nb_page,'customers');
    }

    public function getPaginate($num,$keyword = null){
        $builder = $this->builder();
        
        $builder->select('transaksi_satuan.id_transaksi,pelanggan.nama_pelanggan,admin.nama_admin,cabang.nama_pemilik,transaksi_satuan.tgl_transaksi,transaksi_satuan.tgl_pengambilan,transaksi_satuan.tgl_selesai,transaksi_satuan.total_harga,transaksi_satuan.status')->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_satuan.f_id_pelanggan','inner')->join('admin','admin.id_admin = transaksi_satuan.f_id_admin','left')->join('cabang','cabang.id_cabang = transaksi_satuan.f_id_cabang','left');
        if($keyword != ''){
          $builder->like('pelanggan.nama_pelanggan',$keyword);
          $builder->orLike('admin.nama_admin',$keyword);
          $builder->orLike('cabang.nama_pemilik',$keyword);
          $builder->orLike('transaksi_satuan.status',$keyword);
          $builder->orWhere('transaksi_satuan.tgl_transaksi',$keyword);
          if($keyword == "pusat" || $keyword == "Pusat"){
            $builder->orWhere('transaksi_satuan.f_id_cabang IS NULL');
          }
          if($keyword == "online" || $keyword == "Online"){
            $builder->orWhere('transaksi_satuan.f_id_admin IS NULL');
          }
        }
        return [
          "TransaksiSatuan" => $this->paginate($num),
          "pager" => $this->pager
        ];
      }
      public function getSearchDocument($keyword){
        $builder = $this->builder();
        $builder->select('transaksi_satuan.id_transaksi,pelanggan.nama_pelanggan,admin.nama_admin,cabang.nama_pemilik,transaksi_satuan.tgl_transaksi,transaksi_satuan.tgl_pengambilan,transaksi_satuan.tgl_selesai,transaksi_satuan.total_harga,transaksi_satuan.status')->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_satuan.f_id_pelanggan','inner')->join('admin','admin.id_admin = transaksi_satuan.f_id_admin','left')->join('cabang','cabang.id_cabang = transaksi_satuan.f_id_cabang','left');
        if($keyword != ''){
          $builder->like('pelanggan.nama_pelanggan',$keyword);
          $builder->orLike('admin.nama_admin',$keyword);
          $builder->orLike('cabang.nama_pemilik',$keyword);
          $builder->orLike('transaksi_satuan.status',$keyword);
          $builder->orWhere('transaksi_satuan.tgl_transaksi',$keyword);
          if($keyword == "pusat" || $keyword == "Pusat"){
            $builder->orWhere('transaksi_satuan.f_id_cabang IS NULL');
          }if($keyword == "online" || $keyword == "Online"){
            $builder->orWhere('transaksi_satuan.f_id_admin IS NULL');
          }
        }
        return $builder->get()->getResult();
      }
}
