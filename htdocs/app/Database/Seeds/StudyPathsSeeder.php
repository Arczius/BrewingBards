<?php

namespace App\Database\Seeds;

use App\Models\getStudyPaths;
use CodeIgniter\Database\Seeder;

class StudyPathsSeeder extends Seeder
{
    private $LearningPathModel; 
    public function __construct()
    {
        $this->LearningPathModel = new getStudyPaths(); 
    }
    public function run()
    {
        $data = [
            [
                'Name' => 'Demo Leerpad 1',
                'Required' => false,
            ],
            [
                'Name' => 'Demo Leerpad 2',
                'Required' => false,
            ]
        ];

        foreach($data as $item){
            $this->LearningPathModel->insert($item);
        }
    }
}
