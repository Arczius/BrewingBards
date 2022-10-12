<?php

namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\getClasses;
use App\Models\getUserLogin;
use App\Models\getUsersClasses;

class AllClassFeaturesController extends BaseController{

    private $ClassesModel;
    private $UserMode;
    private $UsersClassesModel;

    public function __construct()
    {
        helper("randomPasswordGen");
        helper("rememberUser");
        helper("permLevelCheck");
        $this->ClassesModel = new getClasses();
        $this->UserModel = new getUserLogin();
        $this->UsersClassesModel = new getUsersClasses();
    }

    // Start CreateStudentFromList Feature
    public function indexCreateStudents($id)
    {
        
        permLevelCheck(rememberUser(), 2);
        $data = [
            'title' => "Klas aanmaken",
            'footerClass' => "block--dark",
            'user' => rememberUser(),
        ];

        $base_view_dir = "homepages/moderator";

        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$base_view_dir/header", $data);
        // unsetting the user variable so it cant be accessed after this point
        $data['user'];

        //id ophalen uit url
        $data['HoldID'] = $id;
        


        echo view("$base_view_dir/StudentCreate", $data);

        $data;

        
    }
    public function CreateUsers()
    {
        permLevelCheck(rememberUser(), 2);

        //data ophalen uit de forms
        $text = $this->request->getVar('text');
        $class = $this->request->getVar('class');

        //array op splitsing van de lijst met data
        $holdArray = explode("\n", $text);

        //tijdelijke array's
        $splitArray = [];
        $newSplitArray = [];

        //elke array hun leerling nummer scheiden van de naam
        foreach($holdArray as $i => $data){
            //checken of er een ; inzit 
            if(strpos($data,";") !== false){
                //checken of er een , inzit
                if(strpos($data,",") !== false){
                    $explode = explode(";", $data);
                    array_push($splitArray, $explode);
                } else{
                    echo "formating was incorrect";
                    die();
                }
            } else{
                echo "formating was incorrect";
                die();
            }
            
        }
        //de naam van elke array goed zetten
        foreach($splitArray as $i => $data){
            $explode = explode(",", $data[0]);
            $numb = count($explode)-1;
            $tempArray= [];
            $newTempArray =[];
            for($i=$numb; $i >= 0; $i--){
                array_push($tempArray,$explode[$i]);
            }
            $tempName = implode(' ',$tempArray);
            array_push($newTempArray, $tempName, $data[1]);
            array_push($newSplitArray, $newTempArray);
        }
        //checken op het leerling nummer al bestaat
        foreach($newSplitArray as $i => $data){
            $exist = $this->UserModel->where("SchoolUserName", $data["1"])->get()->getResult();

            if(!$exist){
                //random wachtwoord maken en encryptie
                $genPassword = randomPasswordGen();
                $password = password_hash($genPassword, PASSWORD_DEFAULT);
                //mail samenstellen
                $mail = $data["1"]."@mydavinci.nl";
                $completeMail = preg_replace('/\s+/', '', $mail);
                //user naar database sturen
                $this->UserModel->insert(["Name" => $data["0"],"Password" => $password,"Mail" => $completeMail, "SchoolUserName" => $data["1"], "PermissionLevel" => "1"]);
                echo"naam: ".$data["0"].", Email: ".$completeMail.", Wachtwoord: ".$genPassword."<br>";
                //user opnieuw ophalen voor het gegenereerde id optehalen
                $Student = $this->UserModel->where("SchoolUserName", $data["1"])->first();
                //student aan hun klas linken
                $this->UsersClassesModel->insert(["ClassID"=>$class,"UserID"=>$Student["ID"]]);
            }
            else{
                //voor het geval dat de user niet bestaat krijg je deze regel tezien en wordt deze user geskipped
                echo $data["0"]." bestaat al en is daarvoor niet aangemaakt<br>";
            }
        }
    }
    // End CreateStudentsFromList Feature

    // Start ClassCreate Feature
    public function indexClassCreate()
    {

        $data = [
            'title' => "Klas aanmaken",
            'footerClass' => "block--dark",
            'user' => rememberUser(),
        ];

        $base_view_dir = "homepages/moderator";

        echo view("basic/head", $data);

        // unsetting the title variable so it cant be accessed after this point
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$base_view_dir/header", $data);

        // unsetting the user variable so it cant be accessed after this point
        $data['user'];

        echo view("$base_view_dir/ClassCreate");

        $data;
    }
    public function CreateClass()
    {
        $text = $this->request->getVar('className');
        
        $this->ClassesModel->insert(["Name"=>$text]);

        return redirect()->to('/profile');
    }
    // End ClassCreate Feature

    // Start DeleteClass Feature
    public function Delete($id)
    {
        permLevelCheck(rememberUser(), 2);
        
        $getClassStudents = $this->UsersClassesModel->where("ClassID",$id)->findall();

        $Students = [];
        foreach($getClassStudents as $student){
            $this->UserModel->where("id",$student["UserID"])->delete();
            $this->UsersClassesModel->where("UserID",$student["UserID"])->delete();
        }
        $this->ClassesModel->where("id",$id)->delete();

        return redirect()->to('/profile');
        
    }
    // End ClassDelete Feature

    // Start UpdateClass Feature
    public function indexUpdateClass($id){
        $holdClass = $this->ClassesModel->where("ID",$id)->first();
        permLevelCheck(rememberUser(), 2);
        $data = [
            'title' => "Update Klas - Moderator",
            'user' => rememberUser(),
        ];
        $base_view_dir = "homepages/moderator";

        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];

        echo view("$base_view_dir/header", $data);
        // unsetting the user variable so it cant be accessed after this point
        $data['user'];
        
        $data["HoldID"] = $holdClass;
        echo view('homepages/moderator/ClassesEdit', $data);
    }

    public function UpdateClass(){
     $newClassName = $this->request->getVar('className');
     $classID = $this->request->getVar('classID');

     $holdClass = $this->ClassesModel->where("ID",$classID)->first();

     $data = array(
        'ID' => $classID,
        'Name'=> $newClassName
     );

     $this->ClassesModel->replace($data);
     return redirect()->to('/profile');

    }
    // End UpdateClassFeature

public function Back(){
    return redirect()->to('/profile');
}
}
