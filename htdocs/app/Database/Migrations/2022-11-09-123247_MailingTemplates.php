<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MailingTemplates extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'MailingID' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'templateName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'keywords' => [
                'type' => 'TEXT',
            ],
            'content' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('MailingID', true, true);
        $this->forge->createTable('MailingTemplates');
    }

    public function down()
    {
        $this->forge->dropTable('MailingTemplates');
    }
}
