<!-- Include the load file for signup  -->
<?PHP 
  include __DIR__."/../load.php";
 include __DIR__."/db_connection.php";
  error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<!-- load the head of the page  -->
 <?PHP load_signuptemplate('_main')?>

  <body class="text-center">
   
  <!-- load the main form content  -->
<?PHP   load_signuptemplate('_head')   ?>


    
  </body>
</html>
