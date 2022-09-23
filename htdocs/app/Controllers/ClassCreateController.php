<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class ClassCreateController extends Controller
{
    public function index()
    {
        return view('homepages/moderator/ClassCreate');
    }
    public function CreateClass()
    {
        $ClassesModel = new \App\Models\getClasses;

        $text = $this->request->getVar('className');
        
        $ClassesModel->insert(["Name"=>$text]);

        return redirect()->to('/profile');
    }
}