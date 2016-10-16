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
     echo "<div id='main-div'><div id='main-div-title'><span id='main-title-span'>Ode's Food Poll</span><span id='main-descrpt-span'><center>Below are polls hosted by Ode<br>Select a poll to see the results and vote, or sign-in to make a new poll.</center></span></div></div>";
?>
</body>
</html>