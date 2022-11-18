<?php

function scriptSaves($thePost){
    $thePost = array_map('trim', $thePost);
    $thePost = array_map('strip_tags', $thePost);
    return $thePost;
}

// $thePost word hier afgegaan om te trimmen en de tags te strippen en met de array_map function word elk item van de array af gegaan daarna word die terug gereturned.