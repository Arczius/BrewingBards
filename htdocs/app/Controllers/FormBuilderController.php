<?php

namespace App\Controllers;

// use App\Models\getLearningPaths;
use App\Models\getStudyPaths;
use CodeIgniter\Controller;

class FormBuilderController extends Controller
{
    private $base_view_dir = "form_builder";
    private $StudyPathsModel;
    public function __construct()
    {
        $this->StudyPathsModel = new getStudyPaths();
    }

    public function index(){
        $data['StudyPaths'] = $this->StudyPathsModel->findAll();
        echo view("$this->base_view_dir/index/StudyPaths", $data);
    }

    public function overview($id){
        $item = $this->StudyPathsModel->where('ID', $id)->first();
        if(isset($item)){
            $data['StudyPath'] = $item;
            echo view($this->base_view_dir . "/overview/Main", $data);
        }
        else{
            return redirect()->back();
        }
    }

    public function create(){
        // if($this->request->getPost() !== null){
        if($this->request->getMethod(false) === 'post'){
            d($this->request->getPost());
            $data = [
                'Name' => $this->request->getPost('StudyPathName'),
                'Required' => boolval($this->request->getPost('required')),
            ];
            $this->StudyPathsModel->insert($data);
        }
        else{
            echo view("$this->base_view_dir/create/form");
        }
    }
}
