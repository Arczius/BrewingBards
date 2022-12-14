<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClassesModerators extends Migration
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
            'ClassID' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'ModeratorName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

        ]);
        $this->forge->addKey('ID', true, true);
        $this->forge->createTable('Classes_Moderators');
    }

    public function down()
    {
        $this->forge->dropTable('Classes_Moderators');
    }
}
