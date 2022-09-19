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
        $Mail = $this->request->getVar('Mail');
        $Password = $this->request->getVar('Password');
        
        $data = $userModel->where('Mail', $Mail)->first();
        
        if($data){
            $pass = $data['Password'];
            
            $authenticatePassword = Password_verify($Password, $pass);
            if($authenticatePassword == true){
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
?>