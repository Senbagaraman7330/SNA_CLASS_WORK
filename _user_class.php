<?PHP 
include __DIR__."/load.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
database::getconnection();


class User
{
    private $conn;
    public $username;
   public $id;

    public function __construct($username)
    {
        $this->conn = database::$conn;
        $this->username = $username;
        $this->id = null;

        $sql = "SELECT `id` FROM `signup` WHERE `username`= '$username'  OR `id` = '$username' LIMIT 1";
        $result = $this->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
        } else {
            throw new Exception("Username doesn't exist");
        }
    }

    public function __call($name, $arguments)
    { 
        $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
        $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));

        if (substr($name, 0, 3) == "get") {
            return $this->_get_data($property);
        } elseif (substr($name, 0, 3) == "set") {
            return $this->_set_data($property, $arguments[0]);
        }
    }

    public static function login($user, $pass)
    {
        $query = "SELECT * FROM `signup` WHERE `username` = '$user' ";
        $conn = Database::getConnection();
        $result = $conn->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['password'] == $pass) {
                /*
                1. Generate Session Token
                2. Insert Session Token
                3. Build session and give session to user.
                */
                return $row['username'];
            } else {
                return false;
        }
    }
    }

    private function _get_data($var)
    {
        if (!$this->conn) {
            $this->conn = Database::getconnection();
        }

        $sql = "SELECT `$var` FROM `user_data` WHERE `id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();

        return ($result->num_rows > 0) ? $result->fetch_assoc()[$var] : null;
    }

    private function _set_data($var, $data)
    {
        if (!$this->conn) {
            $this->conn = Database::getconnection();
        }

        $sql = "UPDATE `user_data` SET `$var`=? WHERE `id`=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $data, $this->id);

        return $stmt->execute();
    }

   
    public function setDob($year, $month, $day)
    {
        if (checkdate($month, $day, $year)) {
            return $this->_set_data('dob', "$year-$month-$day");
        }
        return false;
    }

}

