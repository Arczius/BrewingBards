<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;

use App\Models\getClasses;
use App\Models\getStudents;
use App\Models\getUsersClasses;
  
class DeleteClassController extends Controller
{
    private $ClassesModel;
    private $StudentModel;
    private $ClassStudentModel;

    public function __construct(){
        helper("rememberUser");
        helper("permLevelCheck");
        $this->ClassesModel = new getClasses();
        $this->StudentModel = new getStudents();
        $this->ClassStudentModel = new getUsersClasses();
    }

    public function Delete($id)
    {
        permLevelCheck(rememberUser(), 2);
        
        $getClassStudents = $this->ClassStudentModel->where("ClassID",$id)->findall();

        $Students = [];
        foreach($getClassStudents as $student){
            $this->StudentModel->where("id",$student["UserID"])->delete();
            $this->ClassStudentModel->where("UserID",$student["UserID"])->delete();
        }
        $this->ClassesModel->where("id",$id)->delete();

        return redirect()->to('/profile');
        
    }
}