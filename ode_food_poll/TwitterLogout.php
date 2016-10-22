<?php
    
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
    
    session_start();
    
    unset($_SESSION['TwitterUsername']);
    unset($_SESSION['oauth_token']);
    unset($_SESSION['oauth_token_secret']);
    session_destroy();
    header("location: index.php");
?>