<!DOCTYPE html>
<html>
   <head>
   
   </head>
<body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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