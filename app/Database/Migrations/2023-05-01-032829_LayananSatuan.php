<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LayananSatuan extends Migration
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
            'f_id_barang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'layanan' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'harga' => [
                'type' => 'INT',
            ]
        ]);
        $this->forge->addKey('id_layanan', true);
        $this->forge->addForeignKey('f_id_barang', 'barang', 'id_barang', 'CASCADE', 'CASCADE');
        $this->forge->createTable('layanan_satuan');
    }

    public function down()
    {
        $this->forge->dropTable('layanan_satuan');
    }
}
