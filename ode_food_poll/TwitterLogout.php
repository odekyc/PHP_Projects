<?php
    
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
    
    session_start();
    

     unset($_SESSION['username']);
    unset($_SESSION['oauth_token'] );
     unset($_SESSION['profilepic']);
     unset($_SESSION['oauth_verifier']);
     unset($_SESSION['dbupdated']);
     unset($_SESSION['dbupdate-error']);
     unset($_SESSION['whichupdatevote']);
     unset($_SESSION['mypoll-deleted']);
    session_destroy();
    header("location: index.php");
?>