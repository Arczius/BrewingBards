<?php

/**
 * randomPasswordGen a function that generates a random password
 *
 * @param  int $length the length of the password
 * @return string gives you back the password
 */
function randomPasswordGen( $length = 8 ){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}