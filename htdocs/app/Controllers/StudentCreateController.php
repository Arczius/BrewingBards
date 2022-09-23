<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class StudentCreateController extends Controller
{
    public function __construct(){
        helper("randomPasswordGen");
    }

    public function index()
    {
        return view('homepages/moderator/studentcreate');
    }
    public function CreateUsers()
    {
        $text = $this->request->getVar('text');
        $class = $this->request->getVar('class');

        $holdArray = explode("\n", $text);
        $splitArray = [];
        $newSplitArray = [];
        foreach($holdArray as $i => $data){
            $explode = explode(";", $data);
            array_push($splitArray, $explode);
        }
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

        // id = auto gen
        // name = Rowin Bodegom
        // Email = 99056991 + @mydavinci.nl
        // password = generated en encript
        // SchoolUserName = 99056991
        // permisionlevel = 1
        $UserModel = new \App\Models\getUserLogin;
        $email = \Config\Services::email();
        

        foreach($newSplitArray as $i => $data){
            $exist = $UserModel->where("SchoolUserName", $data["1"])
                               ->get()
                               ->getResult();
            if(!$exist){
                $genPassword = randomPasswordGen();
                $password = password_hash($genPassword, PASSWORD_DEFAULT);
                $mail = $data["1"]."@mydavinci.nl";
                $completeMail = preg_replace('/\s+/', '', $mail);
                $UserModel->insert(["Name" => $data["0"],"Password" => $password,"Mail" => $completeMail, "SchoolUserName" => $data["1"], "PermissionLevel" => "1"]);
                var_dump("naam: ".$data["0"]." ,Email: ".$completeMail." ,Wachtwoord: ".$genPassword."\n");
            }
            else{
                echo $data["0"]." bestaat al en zijn daarvoor niet aangemaakt<br>";
            }
        }
    }
}