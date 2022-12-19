<?php

namespace App\Controllers;  
use CodeIgniter\Controller;
  
class UpdateCharacterController extends BaseController{

    public function index($characterID){

        $character = $this->getCharactersModel->where("CharacterID", $characterID)->first();

        $allRaces = $this->getDnDRacesModel->findall();

        $allClasses = $this->getDnDClassesModel->findall();

        return view("homepages/user/UpdateCharacter", ["character" => $character, "allRaces" => $allRaces, "allClasses" => $allClasses]);
    }

    public function updateCharacter($characterID){
        $character = $this->getCharactersModel->where("CharacterID", $characterID)->first();

        $this->getCharactersModel->replace(["CharacterId" => $characterID, "UserId" => rememberUser()["ID"], "CharacterName" => $this->request->getPost("CharacterName"), "CharacterRace" => $this->request->getPost("CharacterRace"), "CharacterClass" => $this->request->getPost("CharacterClass"), "CharacterActivity" => $character["CharacterActivity"]]);

        return redirect()->to("/User/CharacterViewPage");
    }
}