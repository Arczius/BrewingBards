<?php 
namespace App\Controllers;

use App\Models\getUserLogin;
use CodeIgniter\Controller;
  
class AdminController extends Controller
{
    private $UsersModel;
    private $BaseAdminViewDirectory = "homepages/admin";


    public function __construct()
    {
        helper("rememberUser");

        $this->UsersModel = new getUserLogin();
    }

    public function index()
    {
        $data = [
            'title' => "Home - Administrator",
            'user' => rememberUser(),
            //finding all users with the moderator permission level
            'moderators' => $this->UsersModel->where('PermissionLevel', 2)->findAll(),
        ];

        

        echo view("basic/head", $data);
        $data['title'];

        echo view("$this->BaseAdminViewDirectory/header", $data);
        $data['user'];

        echo view("$this->BaseAdminViewDirectory/content", $data);
        
        $data['moderators'];


        $data;
    }

    public function createModPage(){

        $data = [
            'title' => "Home - Administrator",
            'user' => rememberUser(),
            //finding all users with the moderator permission level
            'moderators' => $this->UsersModel->where('PermissionLevel', 2)->findAll(),
        ];

        echo view("basic/head", $data);
        $data['title'];

        echo view("$this->BaseAdminViewDirectory/header", $data);
        $data['user'];

        
        echo view('homepages/admin/createMod');
    }

    public function createModerator(){
        $userModel = new \App\Models\getUserLogin;

        $explode = explode("@", $this->request->getPost("Mail"));

        $Password = password_hash($this->request->getPost("Password"), PASSWORD_DEFAULT);

        $userModel->insert(["Name" => $this->request->getPost("UserName"), "Password" => $Password, "Mail" => $this->request->getPost("Mail"), "SchoolUserName" => $explode[0], "PermissionLevel" => "2"]);

        return redirect()->to("/AdminHome");
        }

     */   helper("permLevelCheck");
    
    public function index()
    {
        permLevelCheck(rememberUser(), 3);
        return view('/homepages/AdminHome');

    }*/
}