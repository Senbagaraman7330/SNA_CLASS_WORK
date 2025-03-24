<?PHP  

// include class file 
include __DIR__."/../signup_class/database_connection_class.php";
include __DIR__."/../signup_class/insert_value_db_class.php";
// include __DIR__."/../signup_class/_get_value_class.php";
include __DIR__."/../_user_class.php";

//Error display code
error_reporting(E_ALL);
ini_set('display_errors',1);

if ($_SERVER['REQUEST_METHOD'] === "POST"){


 $user = $_POST['username'] ?? '';
 $pass = $_POST['password'] ?? '';
 $email = $_POST['email'] ?? '';
 $phone = $_POST['phone'] ?? '';

 // Validate input (recommended)
        
if (empty($user) || empty($pass) || empty($email) || empty($phone)) {
    die("All fields are required.");
}
else{
    insertvalue::insertvalue_dd($user,$pass,$email,$phone);

}
           
}


 

 ?>

