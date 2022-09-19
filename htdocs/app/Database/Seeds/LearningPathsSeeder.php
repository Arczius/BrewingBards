<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use PDO;

class LearningPathsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            "Demo leerpad 1",
            "Demo leerpad 2",
        ];

        foreach($data as $item){
            $Name = $item;

            $this->db->query("INSERT INTO LearningPaths ( Name ) VALUES ( '$Name' )");
        }
    }
}
