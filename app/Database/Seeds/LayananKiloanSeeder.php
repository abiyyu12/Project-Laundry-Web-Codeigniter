<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LayananKiloanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_layanan' => 'Cuci+Strika',
                'harga' => 7000,
            ],
            [
                'nama_layanan' => 'Strika',
                'harga' => 5000,
            ],
            [
                'nama_layanan' => 'Cuci',
                'harga' => 5000,
            ]
        ];
        $this->db->table('layanan_kiloan')->insertBatch($data);
    }
}
