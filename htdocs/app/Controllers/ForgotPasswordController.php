<?php

namespace App\Controllers;  
use CodeIgniter\Controller;

  
class ForgotPasswordController extends BaseController{

    public function __construct(){
        helper("randomPasswordGen");
        helper("ForgotPasswordMail");
    }
    public function index()
    {
        $data = [
            'title' => "wachtwoord vergeten",
            'footerClass' => "block--dark",
        ];

        $base_view_dir = "homepages/moderator";


        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];

        echo view("forgotPassword");
        // unsetting the classes variable so it cant be accessed after this point

        $data;
    }
    public function ChangeIndex($ID)
    {
        $data = [
            'title' => "wachtwoord vergeten",
            'footerClass' => "block--dark",
            'ID' => $ID
        ];

        $base_view_dir = "homepages/moderator";


        echo view("basic/head", $data);
        // unsetting the title variable so it cant be accessed after this point
        $data['title'];

        echo view("ForgotPasswordConfirmation");
        // unsetting the classes variable so it cant be accessed after this point

        $data;
    }

    public function sendForgotPasswordNotificationMail(){
        $mail = $this->request->getVar('Mail');
        $name = $this->UserModel->where("Mail", $mail)->first();
        $link = "http://brewingbards.loc/public/ForgotPasswordController/ForgotPasswordPage";

        $length = 30;
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $ID = substr( str_shuffle( $chars ), 0, $length );

        $newLink = $link . "/" . $ID;

        $this->RequestPasswordChangesModel->insert(["ID" => $ID,"Mail" => $mail,"Progression" => false]);

        $TemplateData = $this->MailingTemplates->where('mailingID', 3)->first();
        $MailContent = $TemplateData['content'];
        $search = array('{USERNAME}', '{LINK}');
        $replace = array($name["Name"], $newLink);
        $MailContent = str_replace($search, $replace, $MailContent);

        $mailManager = new ForgotPasswordMail("Social Tavern", "damianvaartmans@gmail.com");
        $mailManager->SendPasswordMail($mail, $name["Name"], $MailContent);
    }

    public function forgotChangePassword(){
        $mail = $this->request->getVar('Mail');
        $ID = $this->request->getVar('ID');
        $user = $this->UserModel->where("Mail", $mail)->first();
        $ChangePasswordRequest = $this->RequestPasswordChangesModel->where("ID", $ID)->first();
        if($ChangePasswordRequest["progression"] == false){
            $genPassword = randomPasswordGen();
            $password = password_hash($genPassword, PASSWORD_DEFAULT);

            $data = array(
                'ID' => $user["ID"],
                'Name' => $user["Name"],
                'Password' => $password,
                'SchoolUserName' => $user["SchoolUserName"],
                'Mail' => $mail,
                'PermissionLevel' => $user["PermissionLevel"]
            );

            $this->UserModel->replace($data);

            $this->RequestPasswordChangesModel->replace(["ID" => $ID,"Mail" => $mail,"Progression" => true]);
    
            $TemplateData = $this->MailingTemplates->where('mailingID', 2)->first();
            $MailContent = $TemplateData['content'];
            $search = array('{USERNAME}', '{PASSWORD}');
            $replace = array($user["Name"],  $genPassword);
            $MailContent = str_replace($search, $replace, $MailContent);
        
            $mailManager = new ForgotPasswordMail("Social Tavern", "damianvaartmans@gmail.com");
            $mailManager->SendPasswordMail($mail, $user["Name"], $MailContent);
        }

        ; 
    }
}