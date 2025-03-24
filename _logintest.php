
<?PHP
include_once __DIR__."/load.php";
include_once __DIR__."/session_class.php";
include_once __DIR__."/signup_class/database_connection_class.php";


class User {
    public static function login($user, $pass)
{
    $query = "SELECT * FROM `signup` WHERE `username` = ?";
    $conn = Database::getConnection();

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Check password
        if ($pass === $row['password']) {
            return $row; // ✅ SUCCESS
        } else {
            die("Incorrect password!"); //  Wrong password
        }
    } else {
        die("User not found in database!"); //  No matching user
    }
}
}

// Display all errors
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Start session
Session::start();

$user = "distamilvel";
$pass = "vel99047";
$result = null;

// Logout handling
if (isset($_GET['logout'])) {
    Session::destroy();
    die("Session destroyed, <a href='_logintest.php'>Login Again</a>");
}

// Check if user is already logged in
if (Session::get('is_loggedin')) {
    $userdata = Session::get('session_user');

    if ($userdata && is_array($userdata)) {
        print("Welcome Back, " . htmlspecialchars($userdata['username']));
    } else {
        print("Session data is missing!");
    } }
    
     else {
    printf("No session found, trying to login now. <br>");
    $result = User::login($user, $pass);
    
    if ($result) {
        echo "Login Success, " . htmlspecialchars($result['username']);
        Session::set('is_loggedin', true);
        Session::set('session_user', $result);
    } else {
        echo "Login failed <br>";
    }
}

echo <<<EOL
<br><br><a href="_logintest.php?logout">Logout</a>
EOL;


 ?>
<pre> <?PHP print_r($_SESSION);?></pre>