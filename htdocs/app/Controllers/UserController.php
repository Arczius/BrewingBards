<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class UserController extends Controller
{
    public function __construct()
    {
        helper("rememberUser");
        helper("permLevelCheck");
    }
    public function index()
    {

        permLevelCheck(rememberUser(), 1);
        return view('/homepages/UserHome');
    }
}