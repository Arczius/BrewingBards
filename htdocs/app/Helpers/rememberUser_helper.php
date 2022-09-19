<?php

    function current_user(){
        $model = new \App\Models\UserModel;

        return $model->where("ID", session()->get("id"))
                    ->first();
    }
?>