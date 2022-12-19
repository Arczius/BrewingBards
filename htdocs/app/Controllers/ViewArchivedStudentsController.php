<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;

use App\Models\getClasses;
use App\Models\UserModel;
use App\Models\getClassesModerators;
use App\Models\getModeratorStudentArchive;

class ViewArchivedStudentsController extends Controller
{
    private $ClassesModel;
    private $UserModel;
    private $ClassesModerators;
    private $ModeratorStudentArchiveModel;

    public function __construct(){
        helper("rememberUser");
        $this->ClassesModel = new getClasses();
        $this->UserModel = new UserModel();
        $this->ModeratorStudentArchiveModel = new getModeratorStudentArchive();
    }

    public function index()
    {
        $moderator =  rememberUser();
        $holdStudentIDs = $this->ModeratorStudentArchiveModel->where("ModeratorID", $moderator["ID"])->FindAll();
        $holdStudents = [];
        foreach($holdStudentIDs as $studentID){
            $getStudent = $this->UserModel->where("ID", $studentID["StudentID"])->First();
            array_push($holdStudents, $getStudent);
        }

        $data = [
            'title' => "Gearchiveerde studenten",
            'footerClass' => "block--dark",
            'Students' => $holdStudents,
            'user' => $moderator,
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

        echo view("$base_view_dir/ArchiveStudents", );

        $data;
    }
}