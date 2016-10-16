<html><body>
<?php
     
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
     
     $Twitter = new EpiTwitter($consumerKey, $consumerSecret);
     
     echo '<a id="twittersbtnsignin" href="' . $Twitter->getAuthenticateUrl() . '">
     <img src="twitterlogin.png" alt="sign in with twitter" />
     </a>';
     
     //  echo '<a id="twitterbtnsignout" href="' . $Twitter->getAuthenticateUrl() . '">
     // <img src="signout.jpg" alt="sign out with twitter" />
     // </a>';

     echo "<link rel='stylesheet' type='text/css' href='stylesheet.css' />"; 
     echo "<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Poll</h1></div>";
?>
</body>
</html>