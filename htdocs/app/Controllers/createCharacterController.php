<?php

namespace App\Controllers;
use App\Models\getUsersClasses;
use App\Models\getStudents;
use App\Models\getClasses;
use App\Models\getCharacters;

class createCharacterController extends BaseController{
    private $ClassesModel;
    private $StudentModel;
    private $ClassStudentModel;
    private $getCharactersModel;

    public function __construct(){
        helper("rememberUser");
        helper("permLevelCheck");
        $this->UsersClassesModel = new getUsersClasses();
        $this->StudentModel = new getStudents();
        $this->ClassModel = new getClasses();
        $this->getCharactersModel = new getCharacters();
    }

    
    public function createCharacter()
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

