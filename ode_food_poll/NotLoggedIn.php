<?php
    
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';

     $Twitter = new EpiTwitter($consumerKey, $consumerSecret);
     
     session_start();
     
      
  
     echo '<a id="twitterbtnsignin" href="' . $Twitter->getAuthenticateUrl() . '">
     <img src="twitterlogin.png" alt="sign in with twitter" />
     </a>';
     
    if(isset($_GET['oauth_token']))
     {
             header("Location: LoggedIn.php");
     }

       
?>