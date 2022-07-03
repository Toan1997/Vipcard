<?php

 function saveImageDirectory($image,$directory)
 {
     return $image->move($directory, $image->getClientOriginalName());
 }
function getBase64Encode($code)
{
    $key = config('default.keybase64');
    return base64_encode($key.$code);

}

 function getBase64Decode($code)
 {

     $key = config('default.keybase64');
     return str_replace( $key,'',base64_decode($code));
 }
