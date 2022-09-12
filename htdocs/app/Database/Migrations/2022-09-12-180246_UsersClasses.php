<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersClasses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'ClassID' => [
                'type' => 'INT',
                'constraint' => '11',
            ],

            'UserID' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
        ]); 
    }

    public function down()
    {
        $this->forge->dropTable('UsersClasses');
    }
}
