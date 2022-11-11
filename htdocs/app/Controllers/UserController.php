<?php 
namespace App\Controllers;  

use App\Models\getCharacters;
use App\Models\getDnDClasses;
use App\Models\getDnDRaces;
  
class UserController extends BaseController
{
    private $getCharactersModel;
    private $getDnDClassesModel;
    private $getDnDRacesModel;

    public function __construct()
    {
        helper("rememberUser");
        helper("permLevelCheck");
        $this->getCharactersModel = new getCharacters();
        $this->getDnDClassesModel = new getDnDClasses();
        $this->getDnDRacesModel = new getDnDRaces();
    }
    public function index()
    {
        
        permLevelCheck(rememberUser(), 1);
        $base_view_dir = "homepages/user";
        $data = [
            'title' => "Home - Gebruiker",
            'user' => rememberUser(),
            'footerClass' => "block--info",
        ];





        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];
        
        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$base_view_dir/header", $data);
        // unsetting the user variable so it cant be accessed after this point
        $data['user'];

        echo view("$base_view_dir/UserHome");

        $data;
    }

    public function LeepadUser(){
          
        permLevelCheck(rememberUser(), 1);
        $base_view_dir = "homepages/user";
        $data = [
            'title' => "Home - Gebruiker",
            'user' => rememberUser(),
            'footerClass' => "block--info",
        ];





        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];
        
        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$base_view_dir/header", $data);
        // unsetting the user variable so it cant be accessed after this point
        $data['user'];

        echo view("$base_view_dir/UserLeerpadOverview");

        $data;
    }
    public function Characterviewpage(){
        $characters = $this->getCharactersModel->where("UserId", rememberUser()["ID"])->findall();
        $dndClasses = $this->getDnDClassesModel->findall();
        $dndRaces = $this->getDnDRacesModel->findall();

        $base_view_dir = "homepages/user";
        $data = [
            'title' => "Home - Gebruiker",
            'user' => rememberUser(),
            'footerClass' => "block--info",
            'characters' => $characters,
            'dndClasses' => $dndClasses,
            'dndRaces' => $dndRaces,
        ];
        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];
        
        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$base_view_dir/header", $data);
        // unsetting the user variable so it cant be accessed after this point
        $data['user'];

        Echo view('homepages/user/UserCharacters', $data);

        $data["characters"];
        $data["dndClasses"];
        $data["dndRaces"];
        $data;
    }








}