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
        helper("permLevelCheck");

        $this->UsersModel = new getUserLogin();
    }

    public function index()
    {
        $data = [
            'title' => "Home - Administrator",
            'footerClass' => "block--main",
            'user' => rememberUser(),
            //finding all users with the moderator permission level
            'moderators' => $this->UsersModel->where('PermissionLevel', 2)->findAll(),
        ];

        

        echo view("basic/head", $data);
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$this->BaseAdminViewDirectory/header", $data);
        $data['user'];

        echo view("$this->BaseAdminViewDirectory/content", $data);
        
        $data['moderators'];


        $data;
    }

    public function createModPage(){

        $data = [
            'title' => "Home - Administrator",
            'footerClass' => "block--main",
            'user' => rememberUser(),
            //finding all users with the moderator permission level
            'moderators' => $this->UsersModel->where('PermissionLevel', 2)->findAll(),
        ];

        echo view("basic/head", $data);
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$this->BaseAdminViewDirectory/header", $data);
        $data['user'];

        
        echo view('homepages/admin/createMod');
    }

    public function createModerator(){
        permLevelCheck(rememberUser(), 3);
        $explode = explode("@", $this->request->getPost("Mail"));

        $Password = password_hash($this->request->getPost("Password"), PASSWORD_DEFAULT);

        $this->UsersModel->insert(["Name" => $this->request->getPost("UserName"), "Password" => $Password, "Mail" => $this->request->getPost("Mail"), "SchoolUserName" => $explode[0], "PermissionLevel" => "2"]);

        return redirect()->to("/AdminHome");
    }

    public function deleteModerator($id){
        permLevelCheck(rememberUser(), 3);
        $this->UsersModel->where('id', $id)->delete();
        return redirect()->to(base_url() . "/profile");
    }

    public function EditModeratorPage($id){
        $data = [
            'title' => "Home - Administrator",
            'footerClass' => "block--main",
            'user' => rememberUser(),
            'moderator' => $this->UsersModel->where('id',$id)->first(),
        ];

        echo view("basic/head", $data);
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$this->BaseAdminViewDirectory/header", $data);
        $data['user'];
        $data['moderator'];

        
        echo view('homepages/admin/EditMod');
    }

    public function updateModAccount(){
        $newName = $this->request->getVar('UserName');
        $Mail = $this->request->getVar('Mail');
        $userID = $this->request->getVar('ID');

        $holdUser = $this->UsersModel->where("ID",$userID)->first();

        $data = array(
            'ID' => $userID,
            'Name' => $newName,
            'Password' => $holdUser['Password'],
            'Mail' => $Mail,
            'PermissionLevel' => 2
        );
        
        $this->UsersModel->replace($data);


        return redirect()->to("/AdminHome");
    }
}