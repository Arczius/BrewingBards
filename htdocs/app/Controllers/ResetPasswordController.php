<?php
namespace App\Controllers;

use App\Models\getUserLogin;
use CodeIgniter\Controller;

class ResetPasswordController extends Controller{
    public function __construct()
    {
        helper("randomPasswordGen");
        $this->UserModel = new getUserLogin();
        
    }
    public function index(){
        	
    }
    public function PasswordMail(){
        
    }
}