<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cabang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cabang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pemilik' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'alamat_cabang' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id_cabang', true);
        $this->forge->createTable('cabang');
    }

    public function down()
    {
        $this->forge->dropTable('cabang');
    }
}
