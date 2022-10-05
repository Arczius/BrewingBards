<?php

namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\getClasses;

class UpdateClassController extends BaseController{
    private $ClassesModel;

    public function __construct()
    {
        $this->ClassesModel = new getClasses();
    }
    public function index($id){
        $getOneClass = $this->ClassesModel->where("ID",$id)->first();
        $data = [
            'title' => "Update klas",
            
        ];
    }
    public function update($id = 0){
        
    }
}