<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RequestPasswordChanges extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'Mail' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'progression' => [
                'type' => 'BOOLEAN'
            ]
        ]);
        $this->forge->createTable('RequestPasswordChanges');
    }

    public function down()
    {
        $this->forge->dropTable('RequestPasswordChanges');
    }
}
