<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DnDClassesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'ClassName' => 'Barbarian'
            ],
            [
                'ClassName' => 'Bard'
            ],
            [
                'ClassName' => 'Cleric'
            ],
            [
                'ClassName' => 'Druid'
            ],
            [
                'ClassName' => 'Fighter'
            ],
            [
                'ClassName' => 'Monk'
            ],
            [
                'ClassName' => 'Paladin'
            ],
            [
                'ClassName' => 'Ranger'
            ],
            [
                'ClassName' => 'Rogue'
            ],
            [
                'ClassName' => 'Sorcerer'
            ],
            [
                'ClassName' => 'Warlock'
            ],
            [
                'ClassName' => 'Wizard'
            ]
        ];


        foreach($data as $item){
            $Name = $item['ClassName'];

            $this->db->query("INSERT INTO DnDClasses (ClassName) VALUES ('$Name')");
        }
    }
}
