<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModeratorStudentArchive extends Migration
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

            'ModeratorID' => [
                'type' => 'INT',
                'constraint' => '11',
            ],

            'StudentID' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
        ]); 

        $this->forge->addKey('ID', true, true);
        $this->forge->createTable('ModeratorStudentArchive');
    }

    public function down()
    {
        $this->forge->dropTable('ModeratorStudentArchive');
    }
}
