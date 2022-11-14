<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserThemesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'ClassID' => 1,
                'LearningPathID' => 1,
            ],
            [
                'ClassID' => 2,
                'LearningPathID' => 1,
            ],
            [
                'ClassID' => 3,
                'LearningPathID' => 1,
            ],
            [
                'ClassID' => 4,
                'LearningPathID' => 1,
            ],
            [
                'ClassID' => 5,
                'LearningPathID' => 1,
            ],
        ];

        foreach($data as $item){
            $ClassID = $item['ClassID'];
            $LearningPathID = $item['LearningPathID'];

            $this->db->query("INSERT INTO UserThemes (ClassID, LearningPathID) VALUES ($ClassID, $LearningPathID)");
        }
    }
}
