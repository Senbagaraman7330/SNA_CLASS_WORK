<?PHP

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="color: brown;">WELCOME TO RAMAN'S WORLD</h1>
    <?PHP $_SESSION['success'] ?>
    <br>
    <a href="/PHPdocs/SNA_CLASS_WORK/_signin/_signin.php">SIGN IN</a>
</body>
</html>

