<?php 
namespace App\Controllers;

use App\Models\getClasses;
use CodeIgniter\Controller;
  
class ModController extends Controller
{
    public function __construct(){
        helper("rememberUser");
    }

    public function index()
    {

        $classes = new getClasses();

        $data = [
            'title' => "Home - Docent",
            'user' => rememberUser(),
            'classes' => $classes->findAll(),
        ];

        $base_view_dir = "homepages/moderator";


        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];


        echo view("$base_view_dir/header", $data);
        // unsetting the user variable so it cant be accessed after this point
        $data['user'];


        echo view("$base_view_dir/content", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['classes'];




        $data;
    }
}