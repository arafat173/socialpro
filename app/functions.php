<?php
function validation($msg,$type='warning'){
 return "<p class='alert alert-{$type}'> {$msg}<button class='close' data-dismiss='alert'>&times;</button></p>";
}

function emailcheck($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function instEmail($email, array $mails){
    $mail_array = explode("@",$email);
    $last = end($mail_array);
    if(in_array($last,$mails)){
        return true;
    }else{
        return false;
    }
}

function mobileVerification($phone){
if(substr($phone,0,2)=='01' || substr($phone,0,4)=='8801' || substr($phone,0,5)=='+8801'){
    return true;
}else{
    return false;
}
}

function old($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }else{
        echo '';
    }
}

function formClean(){
    $_POST='';
}

function locationCheck($location){
    if(isset($_POST[$location])){
        return true;
    }else{
        return false;
    }
}

function move($file,$path='/'){
         
         $file_name=time().'_'.rand().'_'. $file['name'];
         $file_tmp= $file['tmp_name'];
         $file_size= $file['size'];

         move_uploaded_file($file_tmp, $path. $file_name);
         return $file_name;
}

/**
 * all 
 */

 function all($table){
 return connect()->query("SELECT * FROM {$table}");
 }
?>