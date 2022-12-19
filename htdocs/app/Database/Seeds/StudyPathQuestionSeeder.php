<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudyPathQuestionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'Order' => 1,
                'StudyPathID' => 1,
                'QuestionID' => 1,
            ],
        ];

        foreach($data as $item){
            $this->db->table('StudyPathQuestion')->insert($item);
        }
    }
}
