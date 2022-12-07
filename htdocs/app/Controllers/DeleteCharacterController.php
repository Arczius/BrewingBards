<?php

namespace App\Controllers;
use App\Models\getCharacters;

class DeleteCharacterController extends BaseController{
    private $getCharactersModel;

    public function __construct(){
        $this->getCharactersModel = new getCharacters();
    }

    
    public function DeleteCharacter($deleteID){
        var_dump($deleteID);
        $this->getCharactersModel->where("CharacterID", $deleteID)->delete();
        return redirect()->back();
        }
}
