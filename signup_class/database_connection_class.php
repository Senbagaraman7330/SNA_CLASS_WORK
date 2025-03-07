<?php

// Use class to connect a database
class database {
    // Variable to store a database connection
    public static $conn = null;

    // Create a function for connection
    public static function getconnection() {
   if (database::$conn == null){
         // Database credentials
         $servername = get_val('servername');
         $username = get_val('username');
         $password = get_val('password');
         $database = get_val('database');
 
         // Establish connection
         self::$conn = new mysqli($servername, $username, $password, $database);
 
         // Check connection
         if (self::$conn->connect_error) {
             die("Connection failed: " . self::$conn->connect_error);
         }
        }
 
         return self::$conn; // Return the connection object

   
    }
}

// Initialize the connection once
database::getconnection();
?>
