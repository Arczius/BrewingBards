<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ThemesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'main',
            'popping',
            'neon',
            'jungle',
        ];

        foreach($data as $item){
            $Name = $item;

            $this->db->query("INSERT INTO Themes (Name) VALUES ('$Name')");
        }
    }
}
