
<?php
// include database connection 
// include __DIR__."/signup_class/database_connection_class.php"; 


function load_template($name) {

    // Construct the file path dynamically
   
    include $_SERVER['DOCUMENT_ROOT']."/PHPdocs/SNA_CLASS_WORK/_albumtemplate/{$name}.php";
    
}
 function load_signuptemplate($val){
    include __DIR__."/_signuptemplate/{$val}.php";
 }





?>

