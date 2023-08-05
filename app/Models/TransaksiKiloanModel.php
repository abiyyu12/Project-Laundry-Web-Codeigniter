<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiKiloanModel extends Model
{
    protected $table            = 'transaksi_kiloan';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['f_id_pelanggan','f_id_admin','f_id_cabang','tgl_transaksi','tgl_pengambilan','status','tgl_selesai','total_harga'];

    public function getOrders($nb_page) {
        return $this->select('orders.id,customers.nama,customers.address,orders.namaBarang,orders.jumlah,orders.harga')->join('customers', 'customers.id = orders.c_id','inner')->paginate($nb_page,'customers');
    }

    public function getPaginate($num,$keyword = null){
        $builder = $this->builder();
        $builder->select('transaksi_kiloan.id_transaksi,pelanggan.nama_pelanggan,admin.nama_admin,cabang.nama_pemilik,transaksi_kiloan.tgl_transaksi,transaksi_kiloan.tgl_pengambilan,transaksi_kiloan.tgl_selesai,transaksi_kiloan.total_harga,transaksi_kiloan.status')->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_kiloan.f_id_pelanggan','inner')->join('admin','admin.id_admin = transaksi_kiloan.f_id_admin','left')->join('cabang','cabang.id_cabang = transaksi_kiloan.f_id_cabang','left');
        if($keyword != ''){
          $builder->like('pelanggan.nama_pelanggan',$keyword);
          $builder->orLike('admin.nama_admin',$keyword);
          $builder->orLike('cabang.nama_pemilik',$keyword);
          $builder->orLike('transaksi_kiloan.status',$keyword);
          $builder->orWhere('transaksi_kiloan.tgl_transaksi',$keyword);
          if($keyword == "pusat" || $keyword == "Pusat"){
            $builder->orWhere('transaksi_kiloan.f_id_cabang IS NULL');
          }if($keyword == "online" || $keyword == "Online"){
            $builder->orWhere('transaksi_kiloan.f_id_admin IS NULL');
          }
        }
        return [
          "TransaksiKiloan" => $this->paginate($num),
          "pager" => $this->pager
        ];
      }
      public function getSearchDocument($keyword){
        $builder = $this->builder();
        $builder->select('transaksi_kiloan.id_transaksi,pelanggan.nama_pelanggan,admin.nama_admin,cabang.nama_pemilik,transaksi_kiloan.tgl_transaksi,transaksi_kiloan.tgl_pengambilan,transaksi_kiloan.tgl_selesai,transaksi_kiloan.total_harga,transaksi_kiloan.status')->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_kiloan.f_id_pelanggan','inner')->join('admin','admin.id_admin = transaksi_kiloan.f_id_admin','left')->join('cabang','cabang.id_cabang = transaksi_kiloan.f_id_cabang','left');
        if($keyword != ''){
          $builder->like('pelanggan.nama_pelanggan',$keyword);
          $builder->orLike('admin.nama_admin',$keyword);
          $builder->orLike('cabang.nama_pemilik',$keyword);
          $builder->orLike('transaksi_kiloan.status',$keyword);
          $builder->orWhere('transaksi_kiloan.tgl_transaksi',$keyword);
          if($keyword == "pusat" || $keyword == "Pusat"){
            $builder->orWhere('transaksi_kiloan.f_id_cabang IS NULL');
          }if($keyword == "online" || $keyword == "Online"){
            $builder->orWhere('transaksi_kiloan.f_id_admin IS NULL');
          }
        }
        return $builder->get()->getResult();
      }
}
