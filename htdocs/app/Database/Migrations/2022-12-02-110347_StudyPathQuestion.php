<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudyPathQuestion extends Migration
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

            'Order' => [
                'type' => 'INT',
                'constraint' => 11,
            ],

            'StudyPathID' => [
                'type' => 'INT',
                'constraint' => 11,
            ],

            'QuestionID' => [
                'type' => 'INT',
                'constraint' => 11,
            ],

        ]);
        $this->forge->addKey('ID', true, true);
        $this->forge->createTable('StudyPathQuestion');
    }

    public function down()
    {
        $this->forge->dropTable('StudyPathQuestion');
    }
}
