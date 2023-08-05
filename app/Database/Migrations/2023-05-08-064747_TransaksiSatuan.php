<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiSatuan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'f_id_pelanggan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'f_id_admin' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true,
                'unsigned'       => true,
            ],
            'f_id_cabang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true,
                'unsigned'       => true,
            ],
            'tgl_transaksi' => [
                'type' => 'DATE',
            ],'tgl_pengambilan' => [
                'type' => 'DATE',
                'null' => true,
            ],'tgl_selesai' => [
                'type' => 'DATE',
            ],'total_harga' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint'     => '10',
            ]
        ]);
        $this->forge->addKey('id_transaksi', true);
        $this->forge->addForeignKey('f_id_pelanggan', 'pelanggan', 'id_pelanggan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('f_id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('f_id_cabang', 'cabang', 'id_cabang', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transaksi_satuan');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_satuan');
    }
}
