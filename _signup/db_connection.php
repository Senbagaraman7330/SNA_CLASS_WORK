<?PHP
//Error display code
error_reporting(E_ALL);
ini_set('display_errors',1);


//Datebase connection
$servername = "localhost";
$username = "phpmyadmin"; 
$password = "Raman@7330";
$database = "SNA_CLASS";

$conn = new mysqli($servername,$username,$password,$database);

// click connection
if (!$conn){
    echo "Not connected ". mysqli_connect_error($conn);
}
// print_r($_POST);
$user = $_POST['username'] ?? '';
$pass = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';

// Validate input (optional)
if (empty($user) || empty($pass) || empty($email) || empty($phone)) {
    die("All fields are required.");
}


//Get the values from the form via variable


// Prepare the query for values
$stmt = $conn->prepare("INSERT INTO signup (username, password, email, phone) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $user, $pass, $email, $phone);
$stmt->execute();



// check the values are insert properly

if ($stmt->error) {
    echo "Data are not inserted successfully";
} 

$stmt->close();
$conn->close();
?>

