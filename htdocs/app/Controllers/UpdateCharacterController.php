<?php

namespace App\Controllers;  
use CodeIgniter\Controller;
  
class UpdateCharacterController extends BaseController{

    public function __construct(){
        helper("RememberUser");
    }

    public function index($characterID){
        $characterModel = new \App\Models\getCharacters;
        $allRacesModel = new \App\Models\getDnDRaces;
        $AllClassesModel = new \App\Models\getDnDClasses;

        $character = $characterModel->where("CharacterID", $characterID)->first();

        $allRaces = $allRacesModel->findall();

        $allClasses = $AllClassesModel->findall();

        return view("homepages/user/UpdateCharacter", ["character" => $character, "allRaces" => $allRaces, "allClasses" => $allClasses]);
    }

    public function updateCharacter($characterID){
        $characterModel = new \App\Models\getCharacters;

        $characterModel->update($characterID, ["CharacterName" => $this->request->getPost("CharacterName"), "CharacterRace" => $this->request->getPost("CharacterRace"), "CharacterClass" => $this->request->getPost("CharacterClass")]);

        return redirect()->to("/User/CharacterViewPage");
    }
}