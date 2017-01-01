<!DOCTYPE html>
<html>
   <head>
     <link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

 
   </head>
<body>
    

<?php
     
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
    
     session_start();
     
     
     
   if(empty($_SESSION['TwitterUsername']))
   {
      header("Location: NotLoggedIn.php");
     
   }

?>


</body>
</html>