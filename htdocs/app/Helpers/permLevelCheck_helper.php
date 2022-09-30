<?php

/**
 * permLevelCheck
 *
 * @param  array $user the actual user
 * @param  int $permLevel the permission level the user needs to be to access the page
 * @return void
 */
function permLevelCheck($user, $permLevel){
    if($user['PermissionLevel'] !== $permLevel){
        $baseurl = base_url();
        header("location:$baseurl/profile");
        die;
    }
}