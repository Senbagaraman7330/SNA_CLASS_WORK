
<?php
error_reporting();
// Function to load a template file

function load_template($name) {

    // Construct the file path dynamically
   
    include $_SERVER['DOCUMENT_ROOT']."/PHPdocs/SNA_CLASS_WORK/_template/{$name}.php";
    
}
 
 

?>

