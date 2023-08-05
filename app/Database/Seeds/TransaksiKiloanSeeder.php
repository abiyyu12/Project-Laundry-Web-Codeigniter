<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiKiloanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'f_id_pelanggan' => 1,
            'f_id_kasir' => 1,
            'f_id_cabang' => 1,
            'tgl_transaksi' => date('y-m-d'),
            'tgl_pengambilan' => '2023/05/07',
            'tgl_selesai' => date('y-m-d'),
            'total_harga' => 200000,
            'status' => 'selesai',
        ];
        $this->db->table('transaksi_kiloan')->insert($data);
    }
}
