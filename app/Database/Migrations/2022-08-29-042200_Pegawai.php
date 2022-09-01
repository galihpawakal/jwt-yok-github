<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        //WSs $this->forge->addForeignKey('mail_user', 'user', 'email_user');

        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai');
    }
}
