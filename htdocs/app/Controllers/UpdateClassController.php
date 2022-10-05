<?php

namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\getClasses;

class UpdateClassController extends BaseController{
    private $classesModel;

    public function __construct()
    {
        $this->classesModel = new getClasses();
    }
    public function index(){
        $classModel = $this->classesModel;
        $data[];
    }
    public function edit($id = 0){
        ##select classes by ID
        $this->classesModel->find($id);

    }
    public function update($id = 0){
        $this->classesModel->find($id);
    }
}