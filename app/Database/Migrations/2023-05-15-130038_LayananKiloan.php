<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LayananKiloan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_layanan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_layanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('id_layanan', true);
        $this->forge->createTable('layanan_kiloan');
    }

    public function down()
    {
        $this->forge->dropTable('layanan_kiloan');
    }
}
