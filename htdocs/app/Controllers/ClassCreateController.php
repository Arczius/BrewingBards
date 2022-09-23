<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class ClassCreateController extends Controller
{
    public function __construct(){
        helper("rememberUser");
    }

    public function index()
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

        return view('homepages/moderator/ClassCreate');
    }
    public function CreateClass()
    {
        $ClassesModel = new \App\Models\getClasses;

        $text = $this->request->getVar('className');
        
        $ClassesModel->insert(["Name"=>$text]);

        return redirect()->to('/profile');
    }
}