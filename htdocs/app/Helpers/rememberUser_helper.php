<?php

use App\Models\UserModel;


/**
 * rememberUser a function which checks in the session for the user, and finds all data linked to this user
 *
 * @return array all data for the current user
 */
function rememberUser(){
    $model = new UserModel();

    return $model->where("ID", session()->get("id"))->first();
}