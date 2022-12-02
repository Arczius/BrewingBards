<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Question extends Migration
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

            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'required' => [
                'type' => 'BOOLEAN',
            ],

        ]);
        $this->forge->addKey('ID', true, true);
        $this->forge->createTable('Question');
    }

    public function down()
    {
        $this->forge->dropTable('Question');
    }
}
