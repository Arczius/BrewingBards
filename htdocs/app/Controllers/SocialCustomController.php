<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class SocialCustomController extends Controller {

    public function __construct()
    {
        helper("RememberUser");
    }
}
