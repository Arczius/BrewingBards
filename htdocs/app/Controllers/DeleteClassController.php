<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class DeleteClassController extends BaseController
{
    public function Delete($id)
    {
        permLevelCheck(rememberUser(), 2);
        
        $getClassStudents = $this->UsersClassesModel->where("ClassID",$id)->findall();

        foreach($getClassStudents as $student){
            $this->StudentModel->where("id",$student["UserID"])->delete();
            $this->ClassStudentModel->where("UserID",$student["UserID"])->delete();
        }
        $this->ClassesModel->where("id",$id)->delete();
        $this->ClassesModerators->where("ClassID",$id)->delete();
        return redirect()->to('/profile');
        
    }
}