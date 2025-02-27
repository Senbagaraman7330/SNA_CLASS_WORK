<form action="/PHPdocs/SNA_CLASS_WORK/signup_class/_get_value_class.php" method="post">
        <!-- Username field -->
        <label for="username">Username</label><br>
        <input type="text" name="username"><br>
         <button>submit</button>
    </form>

    <?PHP 
      error_reporting(E_ALL);
      ini_set('display_errors',1);
      include __DIR__ ."/database_connection_class.php";
    
    if($_SERVER['REQUEST_METHOD' ] === "POST"){
    //    $_POST['username'] ="";
        if(!empty($_POST['username'])){
            $username = $_POST['username']??'';
        }
        else {
            die("Username is required");
        }

    }
  
 
// Assuming you already have a database connection
$conn = database::$conn;

// Use prepared statements to prevent SQL injection
$sql = "SELECT * FROM signup WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo "Password: " . $row['password'];
} else {
    echo "0 results";
}

    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>
    