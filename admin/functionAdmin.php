<?php

function verifExtension(string $extension, string $type)  :bool {

    //poids max du fichier
    // 1Mo = 1048576 octets
    $typeExt = [
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
     
    ];


    
    if( array_key_exists($extension, $typeExt) && in_array($type,$typeExt)){
        return true;
    }
   
    else{
         return false;
    }
        
       
    
}