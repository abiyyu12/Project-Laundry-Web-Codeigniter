<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailSatuanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'f_id_transaksi' => 1,
            'f_id_pegawai' => 1,
            'f_id_layanan' => 1,
            'jml_barang' => 8,
        ];
        $this->db->table('detail_satuan')->insert($data);
    }
}
