<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserThemes extends Migration
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

            'LearningPathID' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
        ]);

        $this->forge->addKey('ID', true, true);
        $this->forge->createTable('UserThemes');
    }

    public function down()
    {
        $this->forge->dropTable('UserThemes');
    }
}
