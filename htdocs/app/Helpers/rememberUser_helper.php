<?php

function rememberUser(){
    $model = new \App\Models\UserModel;

    return $model->where("ID", session()->get("id"))
                ->first();
}