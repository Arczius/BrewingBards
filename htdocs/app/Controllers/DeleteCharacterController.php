<?php

namespace App\Controllers;  
use CodeIgniter\Controller;

class DeleteCharacterController extends BaseController{
    
    public function DeleteCharacter($deleteID){
        var_dump($deleteID);
        $this->getCharactersModel->where("CharacterID", $deleteID)->delete();
        return redirect()->back();
        }
}
