<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class ChangePasswordController extends Controller
{
    private $UserModel;
    private $session;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->session = session();
        helper("rememberUser");
    }
    public function index()
    {
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
  
    public function loginAuth()
    {
        //data uit de form halen
        $Mail = $this->request->getVar('Mail');
        $Password = $this->request->getVar('Password');
        //kijken of de mail bestaat in de database
        $data = $this->UserModel->where('Mail', $Mail)->first();
        
        if($data){
            //wachtwoord van database naar een standaard var sturen
            $pass = $data['Password'];
            //kijken op de wachtworden overeen komen
            $authenticatePassword = Password_verify($Password, $pass);
            if($authenticatePassword == true){
                //session aanmaken voor de user
                $ses_data = [
                    'id' => $data['ID'],
                    'isLoggedIn' => TRUE,
                    'permissionLevel' => $data["PermissionLevel"],
                ];
                
                $this->session->set($ses_data);
                return redirect()->to('/profile');
            }else{
                $this->session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/');
            }
        }else{
            $this->session->setFlashdata('msg', 'Mail does not exist.');
            return redirect()->to('/');
        }
    }
}