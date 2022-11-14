<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DnDClasses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'DnDClassId' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ClassName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $this->forge->addKey('DnDClassId', true, true);
        $this->forge->createTable('DnDClasses');
    }

    public function down()
    {
        $this->forge->dropTable('DnDClasses');
    }
}
