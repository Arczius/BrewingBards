<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'type' => 'text',
                'title' => "ik ben een title",
                'description' => "Ik ben een description",
                'required' => false,
            ],
        ];

        foreach($data as $question){
            $this->db->table('Question')->insert($question);
        }
    }
}
