<?php 
namespace App\Controllers;

use App\Models\getStudents;
use App\Models\getUsersClasses;
use App\Models\getClasses;
use CodeIgniter\Controller;
  
class AllStudentFeaturesController extends Controller
{

    private $UserModel;
    private $UsersClassesModel;
    private $getClassModel;

    public function __construct(){
        helper("randomPasswordGen");
        helper("rememberUser");
        helper("permLevelCheck");
        $this->getClassModel = new getClasses();       
        $this->UserModel = new getStudents();    
        $this->UsersClassesModel = new getUsersClasses();
    }
    
    // Start StudentEdit Feature
    public function indexStudentEdit($id)
    {
        $holdUser = $this->UserModel->where("ID",$id)->first();
        permLevelCheck(rememberUser(), 2);
        $data = [
            'title' => "Student aanmaken",
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
        $data['HoldID'] = $holdUser;

        return view('homepages/moderator/StudentEdit', $data);
    }

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

        return redirect()->to( base_url().'/classes/'.$holdClasses['ClassID']);
    }
    //End StudentEdit feature

    //Start StudentSwitch Feature
    public function indexSwitchStudent($id)
    {
        $getClassFromUserClass = $this->UsersClassesModel->where("UserID",$id)->first();
        permLevelCheck(rememberUser(), 2);
        $data = [
            'title' => "Student aanmaken",
            'footerClass' => "block--dark",
            'student' => $this->UserModel->where("ID",$id)->first(),
            'activeClass' => $this->getClassModel->where("ID",$getClassFromUserClass["ClassID"])->first(),
            'allClasses' => $this->getClassModel->where("ID !=",$getClassFromUserClass["ClassID"])->findall(),
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
        $data['student'];
        $data['activeClass'];
        $data['allClasses'];

        return view('homepages/moderator/SwitchClass', $data);
    }

    public function SwitchStudent(){
        $StudentID = $this->request->getVar('StudentID');
        $newClass = $this->request->getVar('newClass');


        $oldClassLink = $this->UsersClassesModel->where("UserID",$StudentID)->first();
        $holdForLink = $oldClassLink['ClassID'];

        $data = [
            'ID' => $oldClassLink["ID"],
            'ClassID' => $newClass,
            'UserID' => $StudentID 
        ];
        
        $this->UsersClassesModel->replace($data);

        return redirect()->to( base_url().'/classes/'.$holdForLink);
    }
    //End StudentSwitch Feature

    //Start AddSingleStudent Feature
    public function indexAddSingleStudent($id)
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

        echo view('homepages/moderator/StudentSingle', $data);

        $data;
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
    //End AddSingleStudent Feature

    public function Back(){
        return redirect()->to('/profile');
    }
}