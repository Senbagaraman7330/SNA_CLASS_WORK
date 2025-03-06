
<pre><?PHP 


class Session {

// Session start function 
public static function start(){
    session_start();
}

// session unset function 
public static function unset(){
    session_unset();
}

// Session destory function 
public static function destroy(){
    session_destroy();

}

// assign the values in the form key value pair
public  static function set($key , $value){
    $_SESSION[$key] = $value;
}

// del the particular item in session
public static function del($key){
       unset($_SESSION[$key]);
}

// Check the value is existing 
public static function isset($key){
    isset($_SESSION[$key]);
}

// get the value in session 
public static function get($key, $default = false){
    if (Session::isset($_SESSION[$key])){
        return $_SESSION[$key];
    }
    else{
          return $default;   // if it's not default value is return.
    }
}

}




// setcookie("testcookie", "testvalue", time() + (86400 * 30), "/");
include 'libs/load.php';



if (isset($_GET['logout'])) {
    Session::destroy();
    die("Session destroyed, <a href=''>Login Again</a>");
}

if (Session::get('is_loggedin')) {
    $userdata = Session::get('session_user');
    print("Welcome Back, $userdata[username]");
    $result = $userdata;
} else {
    printf("No session found, trying to login now. <br>");

    if ($result) {
        echo "Login Success, $result[username]";
        Session::set('is_loggedin', true);
        Session::set('session_user', $result);
    } else {
        echo "Login failed <br>";
    }
}





?></pre>































?>