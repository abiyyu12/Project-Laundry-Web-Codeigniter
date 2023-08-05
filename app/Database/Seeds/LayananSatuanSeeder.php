<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LayananSatuanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "f_id_barang" => 1,
                "layanan" => "laundry",
                "harga" => 20000
            ],
            [
                "f_id_barang" => 1,
                "layanan" => "dry clean",
                "harga" => 30000
            ]
        ];

        $this->db->table('layanan_satuan')->insertBatch($data);
    }
}
