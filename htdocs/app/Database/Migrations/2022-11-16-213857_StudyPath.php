<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudyPath extends Migration
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
                'constraint' => 255,
            ],
            'Required' => [
                'type' => 'BOOLEAN', 
            ],
        ]);

        $this->forge->addKey('ID', true, true);
        $this->forge->createTable('StudyPath');
    }

    public function down()
    {
        $this->forge->dropTable('StudyPath');
    }
}
