<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_admin' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '60',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '60',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id_admin', true);
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
