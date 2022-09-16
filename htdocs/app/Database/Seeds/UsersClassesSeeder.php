<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersClassesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'UserID' => 4,
                'ClassID' => 1,
            ],
            [
                'UserID' => 5,
                'ClassID' => 1,
            ],
        ];

        foreach($data as $item){
            $UserID = $item['UserID'];
            $ClassID = $item['ClassID'];

            $this->db->query("INSERT INTO UsersClasses (UserID, ClassID) VALUES ($UserID, $ClassID)");
        }
    }
}
