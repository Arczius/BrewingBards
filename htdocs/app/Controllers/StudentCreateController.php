<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class StudentCreateController extends Controller
{
    public function index()
    {
        return view('homepages/moderator/studentcreate');
    }
}