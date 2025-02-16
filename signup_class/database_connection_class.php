<?php

// Use class to connect a database
class database {
    // Variable to store a database connection
    public static $conn;

    // Create a function for connection
    public static function getconnection() {
        // Database credentials
        $servername = "localhost";
        $username = "phpmyadmin";
        $password = "Raman@7330";
        $database = "SNA_CLASS";

        // Establish connection
        self::$conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if (self::$conn->connect_error) {
            die("Connection failed: " . self::$conn->connect_error);
        }

        return self::$conn; // Return the connection object
    }
}

// Initialize the connection once
database::getconnection();
?>
