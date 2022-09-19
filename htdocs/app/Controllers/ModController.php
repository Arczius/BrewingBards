<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class ModController extends Controller
{
    public function index()
    {
        return view('/homepages/ModHome');
    }
}