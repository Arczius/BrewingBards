<?php

namespace App\Controllers;
use App\Models\getUsersClasses;
use App\Models\getStudents;
use App\Models\getClasses;

class ClassViewController extends BaseController
{
    private $UsersClassesModel;
    private $StudentModel;
    private $ClassModel;

    public function __construct(){
        helper("rememberUser");
        helper("permLevelCheck");
        $this->UsersClassesModel = new getUsersClasses();
        $this->StudentModel = new getStudents();
        $this->ClassModel = new getClasses();
    }

    public function index($id)
    {
        permLevelCheck(rememberUser(), 2);
        
        $holdArray = [];
        $AllStudents = $this->UsersClassesModel->where("ClassID",$id)->findall();
        foreach($AllStudents as $SingleStudent){
            $Student = $this->StudentModel->where("ID",$SingleStudent["UserID"])->first();
            array_push($holdArray, $Student);
        }
        $ClassName = $this->ClassModel->where("ID", $id)->first();
        $data = [
            'title' => "klassen Overzicht - Docent",
            'footerClass' => "block--dark",
            'user' => rememberUser(),
            'Students' => $holdArray,
            'classId' => $id,
            'ClassName' => $ClassName["Name"]
        ];

        $base_view_dir = "homepages/moderator";


        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$base_view_dir/header", $data);
        // unsetting the user variable so it cant be accessed after this point
        $data['user'];


        echo view("$base_view_dir/ClassView", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['Students'];
        $data['classId'];
        $data['ClassName'];




        $data;
    }
    
}