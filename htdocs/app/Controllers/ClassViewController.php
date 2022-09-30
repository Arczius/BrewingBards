<?php

namespace App\Controllers;
use App\Models\getUsersClasses;
use App\Models\getStudents;

class ClassViewController extends BaseController
{
    private $UsersClassesModel;
    private $StudentModel;

    public function __construct(){
        helper("rememberUser");
        $this->UsersClassesModel = new getUsersClasses();
        $this->StudentModel = new getStudents();
    }

    public function index($id)
    {
        $holdArray = [];
        $AllStudents = $this->UsersClassesModel->where("ClassID",$id)->findall();
        foreach($AllStudents as $SingleStudent){
            $Student = $this->StudentModel->where("ID",$SingleStudent["UserID"])->first();
            array_push($holdArray, $Student);
        }

        $data = [
            'title' => "klassen Overzicht - Docent",
            'user' => rememberUser(),
            'Students' => $holdArray
        ];

        $base_view_dir = "homepages/moderator";


        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];


        echo view("$base_view_dir/header", $data);
        // unsetting the user variable so it cant be accessed after this point
        $data['user'];


        echo view("$base_view_dir/classView", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['Students'];




        $data;
    }
    
}