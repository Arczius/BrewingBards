<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LearningPathsClassesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'ClassID' => 1,
                'LearningPathID' => 1,
            ],
            [
                'ClassID' => 1,
                'LearningPathID' => 2,
            ],
        ];

        foreach($data as $item){
            $ClassID = $item['ClassID'];
            $LearningPathID = $item['LearningPathID'];

            $this->db->query("INSERT INTO LearningPathsClasses (ClassID, LearningPathID) VALUES ($ClassID, $LearningPathID)");
        }
    }
}
