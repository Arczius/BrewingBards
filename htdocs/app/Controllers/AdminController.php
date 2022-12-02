<?php 
namespace App\Controllers;

use App\Models\getUserLogin;
use CodeIgniter\Controller;
use App\Models\getMailingTemplates;


  
class AdminController extends Controller
{
    private $UsersModel;
    private $BaseAdminViewDirectory = "homepages/admin";
    private $MailingTemplates;


    public function __construct()
    {
        helper("randomPasswordGen");
        helper("rememberUser");
        helper("permLevelCheck");

        $this->UsersModel = new getUserLogin();
        $this->MailingTemplates = new getMailingTemplates();
    }

    public function index()
    {
        $data = [
            'title' => "Home - Administrator",
            'footerClass' => "block--main",
            'user' => rememberUser(),
            //finding all users with the moderator permission level
            'moderators' => $this->UsersModel->where('PermissionLevel', 2)->findAll(),
        ];

        echo view("basic/head", $data);
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$this->BaseAdminViewDirectory/header", $data);
        $data['user'];

        echo view("$this->BaseAdminViewDirectory/content", $data);
        $data['moderators'];

        echo view("basic/text_editor_js.php");

        $data;
    }

    public function createModPage(){

        $data = [
            'title' => "Home - Administrator",
            'footerClass' => "block--main",
            'user' => rememberUser(),
            //finding all users with the moderator permission level
            'moderators' => $this->UsersModel->where('PermissionLevel', 2)->findAll(),
        ];

        echo view("basic/head", $data);
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$this->BaseAdminViewDirectory/header", $data);
        $data['user'];

        
        echo view('homepages/admin/createMod');
    }

    public function createModerator(){

        $explode = explode("@", $this->request->getPost("Mail"));

        
        $Password = password_hash(randomPasswordGen(), PASSWORD_DEFAULT);

        $data = [
                "Name" => $this->request->getPost("UserName"), 
                "Password" => $Password, 
                "Mail" => $this->request->getPost("Mail"), 
                "SchoolUserName" => $explode[0], 
                "PermissionLevel" => "2"
            ];
        
        if($this->request->getPost("Afkorting") !== ""){
            $data["SchoolUserName"] = $this->request->getPost("Afkorting");
        }

        $this->UsersModel->insert($data);

        return redirect()->to("/Admin/AdminHome");
    }

    public function deleteModerator($id){
        permLevelCheck(rememberUser(), 3);
        $this->UsersModel->where('id', $id)->delete();
        return redirect()->to(base_url() . "/profile");
    }

    public function EditModeratorPage($id){
        $data = [
            'title' => "Home - Administrator",
            'footerClass' => "block--main",
            'user' => rememberUser(),
            'moderator' => $this->UsersModel->where('id',$id)->first(),
        ];

        echo view("basic/head", $data);
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$this->BaseAdminViewDirectory/header", $data);
        $data['user'];
        $data['moderator'];

        
        echo view('homepages/admin/EditMod');
    }

    public function updateModAccount(){
        $newName = $this->request->getVar('UserName');
        $Mail = $this->request->getVar('Mail');
        $userID = $this->request->getVar('ID');
        $SchoolUserName = $this->request->getVar('SchoolUserName');

        $holdUser = $this->UsersModel->where("ID",$userID)->first();

        
        $data = array(
            'ID' => $userID,
            'Name' => $newName,
            'Password' => $holdUser['Password'],
            'SchoolUserName' => $holdUser['SchoolUserName'],
            'Mail' => $Mail,
            'PermissionLevel' => 2,
        );

        if($SchoolUserName !== ""){
            $data['SchoolUserName'] = $SchoolUserName;
        }
        
        $this->UsersModel->replace($data);


        return redirect()->to("/Admin/AdminHome");
    }

    public function mailingTemplates()
    {
        $TemplateData = $this->MailingTemplates->findall();

        $data = [
            'title' => "Mailing templates - Administrator",
            'footerClass' => "block--main",
            'user' => rememberUser(),
            'templates' => $TemplateData,
        ];

    


        echo view("basic/head", $data);
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$this->BaseAdminViewDirectory/header", $data);
        $data['user'];

        echo view("$this->BaseAdminViewDirectory/Mailing", $data);

        echo view("basic/text_editor_js.php");

        
        $data;
    }

    public function editTemplates()
    {
        //get form data
        $holdMailContent = $this->request->getPost("mailingContent");
        $holdMailId = $this->request->getPost("mailingID");
        //get mail template form database
        $template =  $this->MailingTemplates->where('mailingID',$holdMailId)->first();
        //split the keyword string into array for usage
        $templateKeywordsArray = explode(", ", $template['keywords']);
        //check if the keywords are in the content
        $continue = true;
        foreach($templateKeywordsArray as $keyword){
            if(strpos($holdMailContent, $keyword) !== false){
                echo "Word Found! <br>";
            } else{
                echo "Word Not Found! <br>";
                $continue = false;
            }         
        }
        if($continue == true){
          $data = [
            'templateName' => $template['templateName'],
            "mailingID" => $holdMailId,
            "keywords" => $template['keywords'],
            "content" => $holdMailContent, 
            ];
            $this->MailingTemplates->replace($data);  
        }        

        return redirect()->to("/Admin/AdminHome");
    }
}