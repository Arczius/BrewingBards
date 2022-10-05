<?php 
namespace App\Controllers;

use App\Models\getStudents;
use App\Models\getClasses;
use App\Models\getUsersClasses;
use CodeIgniter\Controller;
  
class SwitchClassController extends Controller
{

    private $getUserModel;
    private $getClassModel;
    private $getClassUserModel;
   

    public function __construct(){
        helper("rememberUser");
        helper("permLevelCheck");
        $this->getUserModel = new getStudents();
        $this->getClassModel = new getClasses();
        $this->getClassUserModel = new getUsersClasses();
    }
    

    public function index($id)
    {
        $getClassFromUserClass = $this->getClassUserModel->where("UserID",$id)->first();
        permLevelCheck(rememberUser(), 2);
        $data = [
            'title' => "Student aanmaken",
            'footerClass' => "block--dark",
            'student' => $this->getUserModel->where("ID",$id)->first(),
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

        $holdClasses = $this->getClassFromModel->where("UserID",$userID)->first();

        return redirect()->to( base_url().'/classes/'.$holdClasses['ClassID']);
    }

    public function Back(){
        return redirect()->to('/profile');
    }
}