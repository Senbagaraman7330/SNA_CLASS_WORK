<?PHP

// Include the file 
include(__DIR__."/../signup_class/database_connection_class.php"); 

 // Start the session to store login messages

session_start();


class signin{
    private static $conn;
    public static function user_data($user,$pass){

        // check the connection if it's exist or not 
        if (! isset(self::$conn )){
              self::$conn = database::getconnection();
        }
       
        // Select value from database 
        $sql = "SELECT * FROM signup WHERE username = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check whether username and password vaild or not 
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
         

            // Verify password (assuming passwords are stored as plain text)
            if ($row['password'] === $pass) { 
              $_SESSION['user'] = $row['username'];
      
                $_SESSION['success'] = "Login Successful! Welcome, " . $_SESSION['user'];

                // Redirect on success
                header("Location: __message.php");

                exit();

            } 
            else {
                
                $_SESSION['error'] = " Invalid Password!";

                // Redirect back to login page
                header("Location: _signin.php"); 
                exit();
            }
        } 
        else {
            $_SESSION['error'] = " Invalid Username!";

            // Redirect back to login page
            header("Location:_signin.php" ); 
            echo $_SESSION['error'] ;
            exit();
        }
    

    }
}

