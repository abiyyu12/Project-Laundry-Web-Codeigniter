<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i < 10; $i++) {
            $nama = $faker->firstName();
            $data = [
                'nama_pelanggan' => $nama,
                'no_telp' => $faker->phoneNumber(),
                'alamat_pelanggan' => $faker->address(),
                'email' => $nama.'@gmail.com',
                'password' => password_hash($nama,PASSWORD_BCRYPT),
            ];
            $this->db->table('pelanggan')->insert($data);
        }
    }
}
