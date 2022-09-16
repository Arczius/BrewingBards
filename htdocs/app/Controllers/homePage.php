<?php

namespace App\Controllers;

class homePage extends BaseController{
    public function __construct()
    {
        helper("checkUserLogin");
    }
}
?>