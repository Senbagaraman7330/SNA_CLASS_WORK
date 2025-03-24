
<?php
// include database connection 
// include __DIR__."/signup_class/database_connection_class.php"; 
include_once __DIR__."/../photogram.php";
include_once __DIR__."/session_class.php";



function load_template($name) {

    // Construct the file path dynamically
   
    include $_SERVER['DOCUMENT_ROOT']."/PHPdocs/SNA_CLASS_WORK/_albumtemplate/{$name}.php";
    
}
 function load_signuptemplate($val){

    include __DIR__."/_signuptemplate/{$val}.php";

 }


function load_signintemplate($val){

    include __DIR__."/signin_template/{$val}.php";
}

function get_val($key){
    global $array;
    if (isset($array[$key])){
        return $array[$key];
    }
    else{
        return null;
    }

}
?>

