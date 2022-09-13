<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LearningPaths extends Migration
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

            'Name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('ID', true, true);
        $this->forge->createTable('LearningPaths');
    }

    public function down()
    {
        //
    }
}
