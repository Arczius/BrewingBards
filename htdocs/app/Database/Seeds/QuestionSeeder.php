<?php

namespace App\Database\Seeds;

use App\Models\getStudyPaths;
use CodeIgniter\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'type' => 'text',
                // textarea of text-input
                'title' => "ik ben een title",
                'description' => "Ik ben een description",
                'required' => false,
            ],
        ];

        foreach($data as $question){
            $this->LearningPathModel->insert($question);
        }
    }
}
