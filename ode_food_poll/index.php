<html>
   <head>
   <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
       header("Location: LoggedIn.php");
   }
  
    
    
     
     
?>
</body>
</html>