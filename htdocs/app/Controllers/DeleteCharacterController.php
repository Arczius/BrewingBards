<?php

namespace App\Controllers;
use App\Models\getCharacters;

class DeleteCharacterController extends BaseController{
    private $getCharactersModel;

    public function __construct(){
        $this->getCharactersModel = new getCharacters();
    }

    
    public function DeleteCharacter($deleteID){
        $characters = $this->getCharactersModel->where("UserId", rememberUser()["ID"])->findall();

        if(count($characters,0) < "1"){
        $characterModel = new \App\Models\getCharacters;

        $character = $characterModel->where("CharacterID", $deleteID)->first();

        $characterModel->replace(["CharacterId" => $deleteID, "UserId" => rememberUser()["ID"]
        , "CharacterName" => $character["CharacterName"],
         "CharacterRace" => $character["CharacterRace"], 
         "CharacterClass" =>  $character["CharacterClass"],
          "CharacterActivity" => $character["CharacterActivity"],
        "Archive" => true,
        ]);
        }
        return redirect()->back();
        }
}
