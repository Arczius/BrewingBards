<?php 
namespace App\Controllers;

use App\Models\getClasses;
use App\Models\getClassesModerators;
use CodeIgniter\Controller;
  
class ModController extends Controller
{
    private $ClassesModel;
    private $ClassesModerators;
    public function __construct(){
        helper("rememberUser");
        helper("permLevelCheck");
        $this->ClassesModel = new getClasses();
        $this->ClassesModerators = new getClassesModerators();
    }

    public function index()
    {
        permLevelCheck(rememberUser(), 2);
        $classmods = $this->ClassesModerators->findAll();


        $data = [
            'title' => "Home - Docent",
            'user' => rememberUser(),
            'classes' => $this->ClassesModel->findAll(),
            'footerClass' => "block--dark",
            'classmods' => $classmods,
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


        echo view("$base_view_dir/content", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['classes'];
        $data['classmods'];
        $data;
    }
}