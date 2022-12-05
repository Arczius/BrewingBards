<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DnDRacesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'RaceName' => 'Human'
            ],
            [
                'RaceName' => 'Elf'
            ],
            [
                'RaceName' => 'Half-Elf'
            ],
            [
                'RaceName' => 'Dwarf'
            ],
            [
                'RaceName' => 'Halfling'
            ],
            [
                'RaceName' => 'Aarakocra'
            ],
            [
                'RaceName' => 'Aasimar'
            ],
            [
                'RaceName' => 'Gnome'
            ],
            [
                'RaceName' => 'Dragonborn'
            ],
            [
                'RaceName' => 'Genasi'
            ],
            [
                'RaceName' => 'Goliath'
            ],
            [
                'RaceName' => 'Half-Orc'
            ],
            [
                'RaceName' => 'Tiefling'
            ]
            
        ];
        foreach($data as $item){
            $Name = $item['RaceName'];

            $this->db->query("INSERT INTO DnDRaces (RaceName) VALUES ('$Name')");
        }
    }
}
