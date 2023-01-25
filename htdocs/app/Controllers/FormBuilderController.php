<?php

namespace App\Controllers;

// use App\Models\getLearningPaths;
use App\Models\getStudyPaths;
use CodeIgniter\Controller;
use App\Models\getQuestion;
use App\Models\getStudyPathQuestions;

class FormBuilderController extends Controller
{
    private $base_view_dir = "form_builder";
    private $StudyPathsModel;
    private $QuestionModel;
    public function __construct()
    {
        $this->StudyPathsModel = new getStudyPaths();
        $this->QuestionModel = new getQuestion();
        $this->StudyPathQuestion = new getStudyPathQuestions();

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

    public function MakeQuestion(){
        if($this->request->getMethod(false) === 'post'){
            $required = $this->request->getPost('required');
            if($required === null){
                $required = false;
            }
            else{
                $required = true;
            }
            $data = [
                'type' => $this->request->getPost('type'),
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'required' => $required,
            ];

            d($data);
            $this->QuestionModel->insert($data);
            return redirect()->to("/Mod/ReadQuestion");

        }

        else{
            $data = [
                'title' => "vraag maken",
                'user' => rememberUser(),
                'footerClass' => "block--dark",
            ];

            echo view("basic/head", $data);
            echo view("basic/footer", $data);
            echo view("homepages/moderator/header", $data);
            echo view("$this->base_view_dir/MakeQuestion/index");
        }
    }

    public function ReadQuestion(){
        $questions = $this->QuestionModel->findAll();

        $data = [
            'title' => "alle vragen",
            'user' => rememberUser(),
            'footerClass' => "block--dark",
        ];

        echo view("basic/head", $data);
        echo view("basic/footer", $data);
        echo view("homepages/moderator/header", $data);
        $data['questions'] = $questions;

        echo view("$this->base_view_dir/ReadQuestion/index", $data);
    }

    public function SelectQuestion($id){
        $questions = $this->QuestionModel->findAll();
        $leerpad = $this->StudyPathsModel->where("id", $id)->first();
        $StudypathQuestions = $this->StudyPathQuestion->where("StudyPathID" , $id)->findall();
        $LinkedQuestionArray = [];
        if($StudypathQuestions != null){
            foreach($StudypathQuestions as $LinkedQuestion){
                $question = $this->QuestionModel->where("ID", $LinkedQuestion["QuestionID"])->first();
                array_push($LinkedQuestionArray, $question);
            }
        }
        $data = [
            'title' => "Select een vraag",
            'user' => rememberUser(),
            'footerClass' => "block--dark",
        ];

        echo view("basic/head", $data);
        echo view("basic/footer", $data);
        echo view("homepages/moderator/header", $data);
        $data['questions'] = $questions;
        $data['leerpad'] = $leerpad;
        $data['LinkedQuestions'] = $LinkedQuestionArray;

        echo view("$this->base_view_dir/LinkQuestion/index", $data);
    }

    public function LinkQuestion(){
        $Studypath = $this->request->getVar('Studypath');
        $Question = $this->request->getVar('Question');

        $this->StudyPathQuestion->insert(["StudyPathID"=>$Studypath,"QuestionID"=>$Question]);

        return redirect()->to("/Mod/SelectQuestion/$Studypath");
    }
    public function RemoveLinkedQuestion($QuestionID){
        $StudypathQuestions = $this->StudyPathQuestion->where("QuestionID" , $QuestionID)->findall();
        $StudypathQuestion = end($StudypathQuestions);
        $holdID = $StudypathQuestion["StudyPathID"];
        $this->StudyPathQuestion->where("ID" , $StudypathQuestion["ID"])->delete();

        return redirect()->to("/Mod/SelectQuestion/$holdID");
    }
}
