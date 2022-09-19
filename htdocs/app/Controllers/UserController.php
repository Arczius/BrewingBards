<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class UserController extends Controller
{
    public function index()
    {
        return view('/homepages/UserHome');
    }
}