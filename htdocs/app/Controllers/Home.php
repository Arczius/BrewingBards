<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function __construct(){
        helper("rememberUser");
    }

    public function index()
    {
        return view('singin');
    }
    public function homepage()
    {
        //session van de ingelogde persoon wordt opgehaalt
        $session = session()->get();
        echo $session["id"];
        if($session["isLoggedIn"] == true){
            $holdUser = rememberUser();
            //op basis van welke permissionlevel de user heeft wordt hij naar zijn bestemde pagina gestuurd
            switch ($holdUser["PermissionLevel"]){
                case 1:
                    return redirect()->to("/User/UserHome");
                    break;
                case 2:
                    return redirect()->to("/Mod/ModHome");
                    break;
                case 3:
                    return redirect()->to("/Admin/AdminHome");
                    break; 
                default:
                    echo "this wasn't supose to happen";
            }
        }
        echo view('Homepage');
    }
}