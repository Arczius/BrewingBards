<?php
namespace App\Controllers;

use App\Models\getUserLogin;
use CodeIgniter\Controller;

class PasswordEditingController extends Controller{
    private $UserLoginModel;
    private $errorMessages;
    public function __construct()
    {
        helper("randomPasswordGen");
        helper("rememberUser");
        $this->UserLoginModel = new getUserLogin();
        $this->errorMessages = [" "," "," "];
    }

    public function index($error)
    {   
        switch ($error) {
            case 1:
                $this->errorMessages[0] = "Incorrect wachtwoord!";
                break;
            case 2:
                $this->errorMessages[1] = "Wachtwoord voldoet niet aan de eisen";
                break;
            case 3:
                $this->errorMessages[2] = "Wachtwoorden komen niet overeen!";
                break;
        }
        
        $data = [
            'title' => "Wachtwoord veranderen",
            'footerClass' => "block--dark",
            'errorMessages' => $this->errorMessages,
            'user' => rememberUser()
        ];
        switch ($data['user']['PermissionLevel']){
            case 1:
                $base_view_dir = "homepages/user";
                break;
            case 2:
                $base_view_dir = "homepages/moderator";
                break;
        }

        echo view("basic/head", $data);

        // unsetting the title variable so it cant be accessed after this point
        $data['title'];

        echo view("basic/footer", $data);
        // unsetting the classes variable so it cant be accessed after this point
        $data['footerClass'];

        echo view("$base_view_dir/header", $data);

        // unsetting the errorMessages variable so it cant be accessed after this point
        $data['errorMessages'];
        $data['user'];

        echo view("/ChangePassword");

        $data;
    }

    public function changePassword(){
        $oldPassword = $this->request->getVar('oldPassword');
        $newPassword = $this->request->getVar('newPassword');
        $repeatNewPassword = $this->request->getVar('repeatNewPassword');
        $CurrentUser = rememberUser();
        $validationCheck = true;

        $authenticatePassword = Password_verify($oldPassword, $CurrentUser["Password"]);

        // Validate password strength
        $uppercase = preg_match("@[A-Z]@", $newPassword);
        $number    = preg_match('@[0-9]@', $newPassword);
        $specialChars = preg_match('@[^\w]@', $newPassword);

        if(!$uppercase|| !$number || !$specialChars || strlen($newPassword) < 8) {
            $validationCheck = false;
        }
        if($authenticatePassword == true && $newPassword == $repeatNewPassword && $validationCheck != false){
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $data = array(
                'ID' => $CurrentUser["ID"],
                'Name'=> $CurrentUser["Name"],
                'Password'=> $hashedPassword,
                'Mail'=> $CurrentUser["Mail"],
                'SchoolUserName' => $CurrentUser["SchoolUserName"],
                'PermissionLevel'=> $CurrentUser["PermissionLevel"]
            );
            
            $this->UserLoginModel->replace($data);
            
            return redirect()->to("/logout");
        }
        else{
            switch (false) {
                case $authenticatePassword == true:
                    return redirect()->to('/ChangePassword/1');
                    break;                
                case $validationCheck:
                    return redirect()->to('/ChangePassword/2');
                    break;
                case $newPassword == $repeatNewPassword:
                    return redirect()->to('/ChangePassword/3');
                    break;
                default:
                echo "?????? how just how ?????????????????????????";
            }
        }
        return;
    }
}