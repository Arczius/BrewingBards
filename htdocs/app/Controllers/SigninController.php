<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('signin');
    } 
  
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        //data uit de form halen
        $Mail = $this->request->getVar('Mail');
        $Password = $this->request->getVar('Password');
        //kijken of de mail bestaat in de database
        $data = $userModel->where('Mail', $Mail)->first();
        
        if($data){
            //wachtwoord van database naar een standaard var sturen
            $pass = $data['Password'];
            //kijken op de wachtworden overeen komen
            $authenticatePassword = Password_verify($Password, $pass);
            if($authenticatePassword == true){
                //session aanmaken voor de user
                $ses_data = [
                    'id' => $data['ID'],
                    'isLoggedIn' => TRUE
                ];
                
                $session->set($ses_data);
                return redirect()->to('/profile');
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/');
            }
        }else{
            $session->setFlashdata('msg', 'Mail does not exist.');
            return redirect()->to('/');
        }
    }
}