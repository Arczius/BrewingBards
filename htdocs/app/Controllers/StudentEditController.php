<?php 
namespace App\Controllers;

use App\Models\getStudents;
use App\Models\getUsersClasses;
use CodeIgniter\Controller;
  
class StudentEditController extends Controller
{

    private $UserModel;
    private $getClassFromModel;

    public function __construct(){
        helper("rememberUser");
        helper("permLevelCheck");
        $this->UserModel = new getStudents();
        $this->getClassFromModel = new getUsersClasses();
    }
    

    public function index($id)
    {
        $holdUser = $this->UserModel->where("ID",$id)->first();
        permLevelCheck(rememberUser(), 2);
        $data = [
            'title' => "Student aanmaken",
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

        $holdClasses = $this->getClassFromModel->where("UserID",$userID)->first();

        return redirect()->to( base_url().'/classes/'.$holdClasses['ClassID']);
    }

    public function Back(){
        return redirect()->to('/profile');
    }
}