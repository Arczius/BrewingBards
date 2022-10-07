<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserThemesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'UserID' => 1,
                'ThemeID' => 1,
            ],
            [
                'UserID' => 2,
                'ThemeID' => 1,
            ],
            [
                'UserID' => 3,
                'ThemeID' => 1,
            ],
            [
                'UserID' => 4,
                'ThemeID' => 1,
            ],
            [
                'UserID' => 5,
                'ThemeID' => 1,
            ],
        ];

        foreach($data as $item){
            $UserID = $item['UserID'];
            $ThemeID = $item['ThemeID'];

            $this->db->query("INSERT INTO UserThemes (UserID, ThemeID) VALUES ($UserID, $ThemeID)");
        }
    }
}
