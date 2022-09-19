<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('singin');
    }
    public function homepage()
    {
        $session = session();
        return view('Homepage');
    }
}
