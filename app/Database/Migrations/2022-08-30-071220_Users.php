<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'username' => [
                'type' => 'char',
                'constraint' => '50',
            ],
            'userpassword' => [
                'type' => 'varchar',
                'constraint' => '100',
            ],
            'useremail' => [
                'type' => 'varchar',
                'constraint' => '100',
            ],
        ]);

        $this->forge->addPrimaryKey('username');

        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
