<?php

use App\Models\UserModel;

function rememberUser(){
    $model = new UserModel();

    return $model->where("ID", session()->get("id"))->first();
}