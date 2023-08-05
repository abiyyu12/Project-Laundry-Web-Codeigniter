<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CabangSeeder extends Seeder
{
    public function run()
    {
        $Faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i < 20; $i++) { 
            $data = [
                'nama_pemilik' => $Faker->name(),
                'no_telp' => $Faker->phoneNumber(),
                'alamat_cabang' => $Faker->address(),
            ];
            $this->db->table('cabang')->insert($data);
        }
    }
}
