<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClassesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'Name' => 'LPIAO20a1'
            ],
        ];


        foreach($data as $item){
            $Name = $item['Name'];

            $this->db->query("INSERT INTO Classes (Name) VALUES ('$Name')");
        }
    }
}
