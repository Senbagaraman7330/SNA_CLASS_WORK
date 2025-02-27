<!-- Include the load file for signup  -->
<?PHP 
  include __DIR__."/../load.php";
 
  error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<!-- load the head of the page  -->
 <?PHP load_signintemplate('_head')?>

  <body class="text-center">
   
  <!-- load the main form content  -->
<?PHP  load_signintemplate('_main') ?>


    
  </body>
</html>
