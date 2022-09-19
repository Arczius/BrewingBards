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
        $session = session()->get();
        echo $session["id"];
        if($session["isLoggedIn"] == true){
            $holdUser = current_user();
            switch ($holdUser["PermissionLevel"]){
                case 1:
                    return redirect()->to("/UserHome");
                    break;
                case 2:
                    return redirect()->to("/ModHome");
                    break;
                case 3:
                    return redirect()->to("/AdminHome");
                    break; 
                default:
                    echo "this wasn't supose to happen";
            }
        }
        return view('Homepage');
    }
}