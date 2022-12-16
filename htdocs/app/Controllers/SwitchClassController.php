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

    public function SwitchStudent(){
        $StudentID = $this->request->getVar('StudentID');
        $newClass = $this->request->getVar('newClass');


        $oldClassLink = $this->getClassUserModel->where("UserID",$StudentID)->first();
        $holdForLink = $oldClassLink['ClassID'];

        $data = [
            'ID' => $oldClassLink["ID"],
            'ClassID' => $newClass,
            'UserID' => $StudentID 
        ];
        
        $this->getClassUserModel->replace($data);

        return redirect()->to( base_url().'/classes/'.$holdForLink);
    }

    public function Back(){
        return redirect()->to('/profile');
    }
}