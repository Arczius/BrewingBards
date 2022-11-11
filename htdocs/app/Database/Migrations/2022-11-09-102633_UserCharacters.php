<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserCharacters extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'CharacterId' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'UserId' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'CharacterName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'CharacterRace' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'CharacterClass' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'CharacterActivity' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
        ],
        ]);

        $this->forge->addKey('CharacterId', true, true);
        $this->forge->createTable('UserCharacters');
    }

    public function down()
    {
        $this->forge->dropTable('UserCharacters');
    }
}
