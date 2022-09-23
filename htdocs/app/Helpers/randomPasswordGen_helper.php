<?php

function randomPasswordGen( $length = 8 ){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}