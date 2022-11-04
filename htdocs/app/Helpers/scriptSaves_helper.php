<?php

function scriptSaves($thePost){
    $thePost = array_map('trim', $thePost);
    $thePost = array_map('strip_tags', $thePost);
    return $thePost;
}