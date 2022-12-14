<?php


/**
 * scriptSaves - a function to sanitize a post request
 *
 * @param  mixed $thePost the original post request
 * @return array returns a sanitised verions of the post request
 */
function scriptSaves($thePost){
    $thePost = array_map('trim', $thePost);
    $thePost = array_map('strip_tags', $thePost);
    return $thePost;
}
