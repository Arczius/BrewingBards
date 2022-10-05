<?php 
namespace App\Controllers;

use App\Models\getUserLogin;
use App\Models\getUsersClasses;
use CodeIgniter\Controller;
  
class AddSingleStudentController extends Controller
{

    private $UserModel;
    private $UsersClassesModel;

    public function __construct(){
        helper("randomPasswordGen");
        helper("rememberUser");
        helper("permLevelCheck");
        $this->UserModel = new getUserLogin();
        $this->UsersClassesModel = new getUsersClasses();
    }
    

    public function index($id)
    {
        
        permLevelCheck(rememberUser(), 2);
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

        return view('homepages/moderator/StudentSingle', $data);
    }
    public function CreateUser()
    {
        permLevelCheck(rememberUser(), 2);

        //data ophalen uit de forms
        $name = $this->request->getVar('Name');
        $studentUserName = $this->request->getVar('StudentUserName');
        $class = $this->request->getVar('Class');

        $exist = $this->UserModel->where("SchoolUserName", $studentUserName)->get()->getResult();

        if(!$exist){
            //random wachtwoord maken en encryptie
            $genPassword = randomPasswordGen();
            $password = password_hash($genPassword, PASSWORD_DEFAULT);
            //mail samenstellen
            $mail = $studentUserName."@mydavinci.nl";
            $completeMail = preg_replace('/\s+/', '', $mail);
            //user naar database sturen
            $this->UserModel->insert(["Name" => $name,"Password" => $password,"Mail" => $completeMail, "SchoolUserName" => $studentUserName, "PermissionLevel" => "1"]);
            echo"naam: ".$name.", Email: ".$completeMail.", Wachtwoord: ".$genPassword."<br>";
            //user opnieuw ophalen voor het gegenereerde id optehalen
            $Student = $this->UserModel->where("SchoolUserName", $studentUserName)->first();
            //student aan hun klas linken
            $this->UsersClassesModel->insert(["ClassID"=>$class,"UserID"=>$Student["ID"]]);
        }
        else{
            //voor het geval dat de user niet bestaat krijg je deze regel tezien en wordt deze user geskipped
            echo $data["0"]." bestaat al en is daarvoor niet aangemaakt<br>";
            
        echo "<a href='./back'>terug naar pagina</a>";
        }
    }
    public function Back(){
        return redirect()->to('/profile');
    }
}