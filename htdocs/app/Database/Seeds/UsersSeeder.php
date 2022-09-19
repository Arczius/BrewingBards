<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'Name' => "Damian Vaartmans",
                'Password' => "AppelKaasKoekje",
                'Mail' => "99061149@mydavinci.nl",
                'SchoolUserName' => "99061149",
                // Admin permission level
                'PermissionLevel' => "3",
            ],
            [
                'Name' => "Airto Van Vugt",
                'Password' => "GayFishKoekje",
                'Mail' => "99063870@mydavinci.nl",
                'SchoolUserName' => "99063870",
                // Moderator permission level
                'PermissionLevel' => "2",
            ],
            [
                'Name' => "Rowin Bodegom",
                'Password' => "pizza123",
                'Mail' => "99056991@mydavinci.nl",
                'SchoolUserName' => "99056991",
                // Moderator permission level
                'PermissionLevel' => "2",
            ],
            [
                'Name' => "Joran Schrievers",
                'Password' => "VoetbalBoy123",
                'Mail' => "99062987@mydavinci.nl",
                'SchoolUserName' => "99062987",
                // User permission level
                'PermissionLevel' => "1",
            ],
            [
                'Name' => "Sven de Ruijter",
                'Password' => "BlondieBoy69",
                'Mail' => "99063753@mydavinci.nl",
                'SchoolUserName' => "99063753",
                // User permission level
                'PermissionLevel' => "1",
            ],
        ];

        foreach($data as $item){
            $Name = $item['Name'];
            $Password = password_hash($item['Password'], PASSWORD_DEFAULT);
            $Mail = $item['Mail'];
            $SchoolUserName = $item['SchoolUserName'];
            $PermLevel = $item['PermissionLevel'];

            $this->db->query("INSERT INTO Users (Name,Password,Mail,SchoolUserName,PermissionLevel) VALUES ('$Name', '$Password', '$Mail', '$SchoolUserName', $PermLevel)");


        }
    }
}
