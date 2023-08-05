<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'nama_pegawai' => $faker->name(),
                'no_telp' => $faker->phoneNumber(),
                'alamat' => $faker->address(),
            ];
            $this->db->table('pegawai')->insert($data);
        }
    }
}
