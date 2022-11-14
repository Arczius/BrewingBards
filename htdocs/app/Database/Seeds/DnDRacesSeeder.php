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

                'RaceName' => 'Aarakocra'
            ],
            [

                'RaceName' => 'Dwarf'
            ],
        ];
        foreach($data as $item){
            $Name = $item['RaceName'];

            $this->db->query("INSERT INTO DnDRaces (RaceName) VALUES ('$Name')");
        }
    }
}
