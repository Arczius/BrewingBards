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
        helper("RememberUser");
    }

    public function index(){
        $data = [
            'title' => "Leerpad",
            'user' => rememberUser(),
            'footerClass' => "block--dark",
        ];
        $data['StudyPaths'] = $this->StudyPathsModel->findAll();

        echo view("basic/head", $data);
        echo view("basic/footer", $data);
        echo view("homepages/moderator/header", $data);
        echo view("$this->base_view_dir/index/StudyPaths", $data);
    }

    public function overview($id){
        $item = $this->StudyPathsModel->where('ID', $id)->first();
        if(isset($item)){
            $data = [
                'title' => "Leerpad",
                'user' => rememberUser(),
                'footerClass' => "block--dark",
            ];
            $data['StudyPath'] = $item;
            echo view("basic/head", $data);
            echo view("basic/footer", $data);
            echo view("homepages/moderator/header", $data);
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
            ];

            switch($this->request->getPost('required')){
                case 'false':
                    $data['Required'] = false;
                    break;

                case 'true':
                    $data['Required'] = true;
                    break;

                default:
                    return redirect()->to('Mod/form_builder_overview');
            }

            $this->StudyPathsModel->insert($data);

            return redirect()->to('Mod/form_builder_overview');
        }
        else{
            $data = [
                'title' => "Leerpad",
                'user' => rememberUser(),
                'footerClass' => "block--dark",
            ];

            echo view("basic/head", $data);
            echo view("basic/footer", $data);
            echo view("homepages/moderator/header", $data);
            echo view("$this->base_view_dir/create/form");
        }
    }
}
