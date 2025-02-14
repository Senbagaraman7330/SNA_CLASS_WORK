
<?php
// error_reporting();
// Function to load a template file
// include __DIR__."/db_connection.php";

function load_template($name) {

    // Construct the file path dynamically
   
    include $_SERVER['DOCUMENT_ROOT']."/PHPdocs/SNA_CLASS_WORK/_albumtemplate/{$name}.php";
    
}
 function load_signuptemplate($val){
    include __DIR__."/_signuptemplate/{$val}.php";
 }

?>

