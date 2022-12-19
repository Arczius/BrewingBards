<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CreateSeeder extends Seeder
{
    public function run()
    {
        // the name of the seeder without the suffix
        $seederNames = [
            'Classes',
            'Users',
            'UsersClasses',
            'LearningPaths',
            'LearningPathsClasses',
            'Themes',
            'UserThemes',
            'DnDClasses',
            'DnDRaces',
            'StudyPaths',            
            'MailingTemplate',
            'StudyPathQuestion',
            'Question',
        ];

        // a loop which calls all the seeders in this order
        foreach($seederNames as $item){
            $this->call($item ."Seeder");
        }
    }
}
