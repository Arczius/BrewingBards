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
    }
    public function index()
    {
        helper(['form']);
        echo view('signin');
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

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }
}