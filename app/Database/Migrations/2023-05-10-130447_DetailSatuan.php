<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailSatuan extends Migration
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
            'jml_barang' => [
                'type' => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('f_id_transaksi', 'transaksi_satuan', 'id_transaksi', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('f_id_layanan', 'layanan_satuan', 'id_layanan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('f_id_pegawai', 'pegawai', 'id_pegawai', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detail_satuan');
    }

    public function down()
    {
        $this->forge->dropTable('detail_satuan');
    }
}
