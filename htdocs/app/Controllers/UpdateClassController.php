<?php

namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\getClasses;

class UpdateClassController extends BaseController{
    private $ClassesModel;

    public function __construct()
    {
        helper("rememberUser");
        helper("permLevelCheck");
        $this->ClassesModel = new getClasses();
    }
    public function index($id){
        $holdClass = $this->ClassesModel->where("ID",$id)->first();
        permLevelCheck(rememberUser(), 2);
        $data = [
            'title' => "Update Klas - Moderator",
            'user' => rememberUser(),
        ];
        $base_view_dir = "homepages/moderator";

        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];

        echo view("$base_view_dir/header", $data);
        // unsetting the user variable so it cant be accessed after this point
        $data['user'];
        
        $data["HoldID"] = $holdClass;
        echo view('homepages/moderator/ClassesEdit', $data);
    }
    public function UpdateClass(){
     $newClassName = $this->request->getVar('name');
     $classID = $this->request->getVar('classID');

     $holdClass = $this->ClassesModel->where("ID",$classID)->first();

     $data = array(
        'ID' => $classID,
        'Name'=> $newClassName
     );

     $this->ClassesModel->replace($data);
     return redirect()->to('/ClassView');

}
public function Back(){
    return redirect()->to('/profile');
}
}
