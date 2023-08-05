<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create("id_ID");
        for ($i=0; $i < 12; $i++) { 
            $data = [
                "nama_barang" => "Barang".$i
            ];
            $this->db->table("barang")->insert($data);
        }
    }
}
