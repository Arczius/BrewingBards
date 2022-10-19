<?php
namespace App\Controllers;

use App\Models\getUserLogin;
use CodeIgniter\Controller;

class ResetPasswordController extends Controller{
    private $UserLoginModel;
    public function __construct()
    {
        helper("randomPasswordGen");
        $this->UserLoginModel = new getUserLogin();
        
    }
    public function index(){
        	echo view("ResetPassword");
    }
    public function PasswordMail(){
        
    }
    public function resetPassword(){
        $newGeneratedPassword = randomPasswordGen();
    }
}