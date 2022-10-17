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
    public function index($data)
    {
        echo view("basic/head", $data);

        $data['title'];

        echo view("basic/footer", $data);
        $data['footerClass'];

        echo view("$base_view_dir/header", $data);
        $data['user'];
    }


    public function indexClassCreate()
    {

        $data = [
            'title' => "Klas aanmaken",
            'footerClass' => "block--dark",
            'user' => rememberUser(),
        ];

        $base_view_dir = "homepages/moderator";
        $this->index();
        echo view("$base_view_dir/ClassCreate");

        $data;
    }
    public function CreateClass()
    {
        $text = $this->request->getVar('className');
        
        $this->ClassesModel->insert(["Name"=>$text]);

        return redirect()->to('/profile');
    }
}