<!-- i include the comman file name load.php  -->
<?PHP 
include __DIR__.'/../load.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE  html>
<html lang="en">

<!-- head of the page  -->
 <?PHP 
 load_template('_head')
 ?>

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