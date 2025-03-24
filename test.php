<?PHP

include __DIR__."/_user_class.php";

$obj  = new User('end');
 echo $obj ->__call("getFirstname",'');
 echo $obj ->__call("getLastname",'');
?>