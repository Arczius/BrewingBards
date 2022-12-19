<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
  
class ChangePasswordController extends BaseController
{

    public function index(){

        $data = [
            'title' => "Wachtwoord veranderen",
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

        echo view("/ChangePassword");

        $data;
    } 
}
