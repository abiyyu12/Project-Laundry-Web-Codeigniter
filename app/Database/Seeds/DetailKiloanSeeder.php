<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailKiloanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'f_id_transaksi' => 2,
            'f_id_pegawai' => 3,
            'f_id_layanan' => 1,
            'kg' => 3,
        ];
        $this->db->table('detail_kiloan')->insert($data);
    }
}
