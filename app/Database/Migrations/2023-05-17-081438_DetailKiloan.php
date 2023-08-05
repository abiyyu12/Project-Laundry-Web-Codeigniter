<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailKiloan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'f_id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'f_id_layanan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'f_id_pegawai' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kg' => [
                'type' => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('f_id_transaksi', 'transaksi_kiloan', 'id_transaksi', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('f_id_layanan', 'layanan_kiloan', 'id_layanan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('f_id_pegawai', 'pegawai', 'id_pegawai', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detail_kiloan');
    }

    public function down()
    {
        $this->forge->dropTable('detail_kiloan');
    }
}
