<?php

// Function to load a template file

function load_template($name) {

    // Construct the file path dynamically
   
    include __DIR__."/_template/{$name}.php";
    
}
?>

