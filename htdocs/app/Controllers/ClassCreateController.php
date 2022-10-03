<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;

use App\Models\getClasses;
  
class ClassCreateController extends Controller
{
    private $ClassesModel;

    public function __construct(){
        helper("rememberUser");
        $this->ClassesModel = new getClasses();
    }

    public function index()
    {

        $data = [
            'title' => "Klas aanmaken",
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

        return view('homepages/moderator/ClassCreate');
    }
    public function CreateClass()
    {
        $text = $this->request->getVar('className');
        
        $this->ClassesModel->insert(["Name"=>$text]);

        return redirect()->to('/profile');
    }
}