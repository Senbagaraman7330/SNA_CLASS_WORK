<?php 

class insertvalue {

    public static function insertvalue_dd($user, $pass, $email, $phone) {

        // Ensure the database connection is established
        if (!isset(database::$conn)) {
            database::getconnection(); // Ensure the connection is active
        }

        $conn = database::$conn;



        // Prepare and bind the query
        $stmt = $conn->prepare("INSERT INTO signup (username, password, email, phone) VALUES (?, ?, ?, ?)");
        
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ssss", $user, $pass, $email, $phone);
        $stmt->execute();
    
        // Check for execution errors
        if ($stmt->error) {
            echo "Error inserting data: " . $stmt->error;
        } 

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}

?>
