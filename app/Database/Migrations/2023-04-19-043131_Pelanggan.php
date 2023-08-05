<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pelanggan' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'alamat_pelanggan' => [
                'type' => 'TEXT',
            ],'email' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],'password' => [
                'type' => 'VARCHAR',
                'constraint' => '60',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_pelanggan', true);
        $this->forge->createTable('pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}
