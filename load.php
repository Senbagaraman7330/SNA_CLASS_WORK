
<?php
error_reporting();
// Function to load a template file

function load_template($name) {

    // Construct the file path dynamically
   
    include $_SERVER['DOCUMENT_ROOT']."/PHPdocs/SNA_CLASS_WORK/_albumtemplate/{$name}.php";
    
}
 
// This function is use for load the signup page
 function load_signuptemplate($val){  

    include __DIR__ ."/_signuptemplate/{$val}.php";
    
 }

?>

