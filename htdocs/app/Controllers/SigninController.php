<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SigninController extends Controller
{
    private $UserModel;
    private $session;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->session = session();
        helper("rememberUser", "permLevelCheck");
    }
    public function index()
    {
        helper('form');
        helper('cookie');
        echo view('signin');
    } 
  
    public function loginAuth()
    {
        var_dump($this->request->getVar('Mail'));
        die();
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
                if(!$data['Archive']){
                    //session aanmaken voor de user
                    $ses_data = [
                        'id' => $data['ID'],
                        'isLoggedIn' => TRUE,
                        'permissionLevel' => $data["PermissionLevel"],
                    ];
                    date_default_timezone_set('Europe/Amsterdam');
                    $time = time();
                    $currentTime = date('Y-m-d H:i:s', $time);

                    $data = array(
                        'ID' => $data["ID"],
                        'Name' => $data['Name'],
                        'Password' => $data['Password'],
                        'SchoolUserName' => $data['SchoolUserName'],
                        'Mail' => $data["Mail"],
                        'PermissionLevel' => $data["PermissionLevel"],
                        'archive' => false,
                        "TimeLastLoggedIn" => $currentTime
                    );
                    $this->UserModel->replace($data);

                    $this->session->set($ses_data);
                    return redirect()->to('/profile');
                }
                $this->session->setFlashdata('msg', 'Account is Gearchiveerd');
                return redirect()->to('/');
            }else{
                $this->session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/');
            }
        }else{
            $this->session->setFlashdata('msg', 'Mail does not exist.');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $usermail = rememberUser()["Mail"];

        setcookie("Mail", $usermail, time() + 1209600000, '/');
        $this->session->destroy();
        return redirect()->to(base_url());
    }
}