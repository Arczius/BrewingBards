<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class AdminController extends Controller
{

    public function __construct()
    {
        helper("rememberUser");
        helper("permLevelCheck");
    }
    public function index()
    {
        permLevelCheck(rememberUser(), 3);
        return view('/homepages/AdminHome');
    }
}