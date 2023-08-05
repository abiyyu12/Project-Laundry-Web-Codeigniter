<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i < 5; $i++) {
            $user = "user".$i; 
            $data = [
                'nama_admin' => $faker->name(),
                'no_telp' => $faker->phoneNumber(),
                'username' => $user,
                'password' => password_hash($user,PASSWORD_BCRYPT),
                'alamat' => $faker->address(),
            ];
            $this->db->table('admin')->insert($data);
        }
    }
}
