<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class StudentCreateController extends Controller
{
    public function __construct(){
        helper("randomPasswordGen");
        helper("rememberUser");
    }
    

    public function index($id)
    {
        

        $data = [
            'title' => "Klas aanmaken",
            'user' => rememberUser(),
        ];

        $base_view_dir = "homepages/moderator";

        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];


        echo view("$base_view_dir/header", $data);
        // unsetting the user variable so it cant be accessed after this point
        $data['user'];

        //id ophalen uit url
        $data['HoldID'] = $id;

        return view('homepages/moderator/studentcreate', $data);
    }
    public function CreateUsers()
    {
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
        //models ophalen
        $UserModel = new \App\Models\getUserLogin;
        $UsersClassesModel = new \App\Models\getUsersClasses;        
        //checken op het leerling nummer al bestaat
        foreach($newSplitArray as $i => $data){
            $exist = $UserModel->where("SchoolUserName", $data["1"])->get()->getResult();

            if(!$exist){
                //random wachtwoord maken en encryptie
                $genPassword = randomPasswordGen();
                $password = password_hash($genPassword, PASSWORD_DEFAULT);
                //mail samenstellen
                $mail = $data["1"]."@mydavinci.nl";
                $completeMail = preg_replace('/\s+/', '', $mail);
                //user naar database sturen
                $UserModel->insert(["Name" => $data["0"],"Password" => $password,"Mail" => $completeMail, "SchoolUserName" => $data["1"], "PermissionLevel" => "1"]);
                echo"naam: ".$data["0"]." ,Email: ".$completeMail." ,Wachtwoord: ".$genPassword."<br>";
                //user opnieuw ophalen voor het gegenereerde id optehalen
                $Student = $UserModel->where("SchoolUserName", $data["1"])->findall();
                //student aan hun klas linken
                $UsersClassesModel->insert(["ClassID"=>$class,"UserID"=>$Student[0]["ID"]]);
            }
            else{
                //voor het geval dat de user niet bestaat krijg je deze regel tezien en wordt deze user geskipped
                echo $data["0"]." bestaat al en zijn daarvoor niet aangemaakt<br>";
            }
        }
        echo "<a href='./back'>terug naar pagina</a>";
    }
    public function Back(){
        return redirect()->to('/profile');
    }
}