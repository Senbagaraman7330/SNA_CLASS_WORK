<?php
// Function to load a template file
function load_template($name) {
    // Construct the file path dynamically
    include "/var/www/html/PHPdocs/SNA_CLASS_WORK/_template/{$name}.php";
    
}
?>

