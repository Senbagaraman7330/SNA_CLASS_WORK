<?PHP 

include __DIR__."/signup_class/database_connection_class.php";

class User
{
    private $conn;
    private $username;
    private $id;

    public function __construct($username)
    {
        $this->conn = Database::$conn;
        $this->username = $username;
        $this->id = null;

        $sql = "SELECT `id` FROM `auth` WHERE `username`= '$username' LIMIT 1";
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

    // public static function signup($user, $pass, $email, $phone)
    // {
    //     $conn = Database::getConnection();

    //     // Hash the password
    //     $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
    //     $sql = "INSERT INTO users (username, password, email, phone) VALUES (?, ?, ?, ?)";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bind_param("ssss", $user, $hashedPassword, $email, $phone);

    //     return $stmt->execute();
    // }

    private function _get_data($var)
    {
        if (!$this->conn) {
            $this->conn = Database::$conn;
        }

        $sql = "SELECT `$var` FROM `users` WHERE `id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();

        return ($result->num_rows > 0) ? $result->fetch_assoc()[$var] : null;
    }

    private function _set_data($var, $data)
    {
        if (!$this->conn) {
            $this->conn = Database::$conn;
        }

        $sql = "UPDATE `users` SET `$var`=? WHERE `id`=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $data, $this->id);

        return $stmt->execute();
    }

    public function setBio($bio)
    {
        return $this->_set_data('bio', $bio);
    }

    public function getBio()
    {
        return $this->_get_data('bio');
    }

    public function setAvatar($link)
    {
        return $this->_set_data('avatar', $link);
    }

    public function getAvatar()
    {
        return $this->_get_data('avatar');
    }

    public function setFirstname($name)
    {
        return $this->_set_data("firstname", $name);
    }

    public function getFirstname()
    {
        return $this->_get_data('firstname');
    }

    public function setLastname($name)
    {
        return $this->_set_data("lastname", $name);
    }

    public function getLastname()
    {
        return $this->_get_data('lastname');
    }

    public function setDob($year, $month, $day)
    {
        if (checkdate($month, $day, $year)) {
            return $this->_set_data('dob', "$year-$month-$day");
        }
        return false;
    }

    public function getDob()
    {
        return $this->_get_data('dob');
    }

    public function setInstagramlink($link)
    {
        return $this->_set_data('instagram', $link);
    }

    public function getInstagramlink()
    {
        return $this->_get_data('instagram');
    }

    public function setTwitterlink($link)
    {
        return $this->_set_data('twitter', $link);
    }

    public function getTwitterlink()
    {
        return $this->_get_data('twitter');
    }

    public function setFacebooklink($link)
    {
        return $this->_set_data('facebook', $link);
    }

    public function getFacebooklink()
    {
        return $this->_get_data('facebook');
    }

    public function getUsername()
    {
        return $this->username;
    }
}
