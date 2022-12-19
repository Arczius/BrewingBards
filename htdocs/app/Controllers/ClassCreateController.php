<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;

class ClassCreateController extends BaseController
{

    public function index()
    {
        $teachers = $this->UserModel->Where("PermissionLevel","2")->findAll();
        $data = [
            'title' => "Klas aanmaken",
            'footerClass' => "block--dark",
            'user' => rememberUser(),
            'teachers' => $teachers
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

        echo view("$base_view_dir/ClassCreate", );

        $data["teachers"];
        $data;
    }
    public function CreateClass()
    {
        $text = $this->request->getVar('className');
        $teacher = $this->request->getvar('TeacherName');
        $this->ClassesModel->insert(["Name"=>$text]);

        $newclass = $this->ClassesModel->Where("Name","$text")->first();
        $this->ClassesModerators->insert(['ClassID' => $newclass['ID'], "ModeratorName"=>$teacher]);
       
        

        return redirect()->to('/profile');
    }
}