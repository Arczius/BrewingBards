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
        ];

        foreach($data as $item){
            $Name = $item['Name'];
            $Password = password_hash($item['Password'], PASSWORD_BCRYPT);
            $Mail = $item['Mail'];
            $SchoolUserName = $item['SchoolUserName'];
            $PermLevel = $item['PermissionLevel'];

            $this->db->query("INSERT INTO Users (Name,Password,Mail,SchoolUserName,PermissionLevel) VALUES ('$Name', '$Password', '$Mail', '$SchoolUserName', $PermLevel)");


        }
    }
}
