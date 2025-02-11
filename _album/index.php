<!-- i include the comman file name load.php  -->
<?PHP 
include __DIR__.'/../load.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE  html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Album example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    <!-- Bootstrap core CSS -->
<link href="index.css"rel="stylesheet">
    </head>

  <body>
    
<!-- i this line i load the header file . use php -->
 <?PHP 
 load_template("_header");
 
 ?>

<main>

<!-- i this line i load the album example content  -->
<?PHP 

load_template('_album_example');
?>

<!-- I this line i include main image content  -->
 <?PHP 
 
 load_template('_main_contain');
 ?>

</main>

<!-- Footer of the page  -->
 <?PHP 
 load_template('_footer');
 ?>

    <script src="index.js"></script>

      
  </body>
</html>