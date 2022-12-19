<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'ID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'Name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'Password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'Mail' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'SchoolUserName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'PermissionLevel' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'Archive' => [
                'type' => 'BOOLEAN',
            ],
            'TimeLastLoggedIn' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('ID', true, true);

        $this->forge->createTable('Users');
    }

    public function down()
    {
        $this->forge->dropTable('Users');
    }
}
