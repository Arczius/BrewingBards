<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DnDRaces extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'DnDRaceId' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'RaceName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $this->forge->addKey('DnDRaceId', true, true);
        $this->forge->createTable('DnDRaces');
    }

    public function down()
    {
        $this->forge->dropTable('DnDRaces');
    }
}
