<?php

namespace App\Controllers;  
use CodeIgniter\Controller;

class CreateCharacterController extends BaseController{
    
    public function CreateCharacter()
    {
        $check = $this->request->getPost("name");
        if($check == NULL){
            return redirect()->back()->with("msg", "Vergeet niet een naam in te vullen.")->withInput();

        }
        else{
            $data = [
                "UserId" => rememberUser()["ID"],
                "CharacterName" => $this->request->getPost("name"),
                "CharacterRace" => $this->request->getPost("race"),
                "CharacterClass" => $this->request->getPost("class"),
                "CharacterActivity" => "Inactive"
            ];
            $this->getCharactersModel->insert($data);
   
        return redirect()->back();
        }
    }
}
