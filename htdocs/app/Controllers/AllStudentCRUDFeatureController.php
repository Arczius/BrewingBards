<?php 
namespace App\Controllers;

use App\Models\getUserLogin;
use App\Models\getUsersClasses;
use CodeIgniter\Controller;
use NewUserPasswordMail;
use App\Models\getMailingTemplates;

class AllStudentCRUDFeatureController extends Controller
{

    private $UserModel;
    private $UsersClassesModel;
    private $MailingTemplates;

    public function __construct(){
        helper("randomPasswordGen");
        helper("rememberUser");
        helper("permLevelCheck");
        $this->UserModel = new getUserLogin();
        $this->UsersClassesModel = new getUsersClasses();
        $this->MailingTemplates = new getMailingTemplates();
    }
    
    // All Index Pages
    // Student Update Form View Builder
    public function indexUpdateUsers($id)
    {
        $holdUser = $this->UserModel->where("ID",$id)->first();
        permLevelCheck(rememberUser(), 2);
        $data = [
            'title' => "Student Updaten",
            'footerClass' => "block--dark",
            'user' => rememberUser(),
            'HoldID' => $holdUser
        ];
        $view = "StudentEdit";
          $this->index($data,$view);
    }

    // Student Create Form View Builder
    public function indexStudentCreate($id)
    {        
        permLevelCheck(rememberUser(), 2);
        $data = [
            'title' => "Studenten aanmaken",
            'footerClass' => "block--dark",
            'user' => rememberUser(),
            'HoldID' => $id
        ];
        $view = "StudentCreate";
        $this->index($data,$view);
    }

    // Add A Single Student Form View Builder
    public function indexSingleStudent($id)
    {
        
        permLevelCheck(rememberUser(), 2);
        $data = [
            'title' => "Student aanmaken",
            'footerClass' => "block--dark",
            'user' => rememberUser(),
            'HoldID' => $id
        ];
        $view = "StudentSingle";
        $this->index($data,$view);
    }

    public function index($data,$view){
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
        $data['HoldID'];

        echo view("$base_view_dir/$view", $data);

        $data; 
    }
    
    // Create A Single Student Feature
    public function CreateSingleUser()
    {
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

            $TemplateData = $this->MailingTemplates->where('mailingID', 1)->first();
            $MailContent = $TemplateData['content'];
            $search = array('{USERNAME}', '{MAIL}', '{PASSWORD}');
            $replace = array($name,  $mail, $genPassword);
            $MailContent = str_replace($search, $replace, $MailContent);

            helper("NewUserPasswordMail");

            $mailManager = new NewUserPasswordMail("Social Tavern", "damianvaartmans@gmail.com");
            $mailManager->SendPasswordMail($mail, $name, $MailContent);
            die();
        }
        else{
            //voor het geval dat de user niet bestaat krijg je deze regel tezien en wordt deze user geskipped
            echo $name." bestaat al en is daarvoor niet aangemaakt<br>";
        }
        echo "<a href='./back'>terug naar pagina</a>";
    }

    // Create Users From List
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

                $TemplateData = $this->MailingTemplates->where('mailingID', 1)->first();
                $MailContent = $TemplateData['content'];
                $search = array('{USERNAME}', '{MAIL}', '{PASSWORD}');
                $replace = array($data["0"],  $mail, $genPassword);
                $MailContent = str_replace($search, $replace, $MailContent);

                helper("NewUserPasswordMail");

                $mailManager = new NewUserPasswordMail("Social Tavern", "damianvaartmans@gmail.com");

                $mailManager->SendPasswordMail($mail, $data["0"], $MailContent);
            }
            else{
                //voor het geval dat de user niet bestaat krijg je deze regel tezien en wordt deze user geskipped
                echo $data["0"]." bestaat al en is daarvoor niet aangemaakt<br>";
            }
        }
        echo "<a href='/back'>terug naar pagina</a>";
    }

    // update Users Feature
    public function UpdatenUsers(){
        $newName = $this->request->getVar('name');
        $newSchoolUserName = $this->request->getVar('schoolUserName');
        $userID = $this->request->getVar('userID');

        $holdUser = $this->UserModel->where("ID",$userID)->first();

        $mail = $newSchoolUserName."@mydavinci.nl";
        $completeMail = preg_replace('/\s+/', '', $mail);

        $data = array(
            'ID' => $userID,
            'Name' => $newName,
            'Password' => $holdUser['Password'],
            'SchoolUserName' => $newSchoolUserName,
            'Mail' => $completeMail,
            'PermissionLevel' => 1
        );
        
        // $this->UserModel->where("ID",$userID)->first();
        $this->UserModel->replace($data);

        $holdClasses = $this->UsersClassesModel->where("UserID",$userID)->first();

        return redirect()->to( base_url().'/Mod/classes/'.$holdClasses['ClassID']);
    }

    public function ArchiveStudent($StudentID){

        $holdUser = $this->UserModel->where("ID", $StudentID)->first();

        $data = array(
            'ID' => $holdUser["ID"],
            'Name' => $holdUser['Name'],
            'Password' => $holdUser['Password'],
            'SchoolUserName' => $holdUser['SchoolUserName'],
            'Mail' => $holdUser["Mail"],
            'PermissionLevel' => 1,
            'archive' => true
        );
        
        $this->UserModel->replace($data);

        $holdClasses = $this->UsersClassesModel->where("UserID",$StudentID)->first();

        return redirect()->to( base_url().'/Mod/classes/'.$holdClasses['ClassID']);
    }

    public function Back(){
        return redirect()->to('/profile');
    }
}