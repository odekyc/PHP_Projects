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
     echo "<div id='main-div'><div id='main-div-title'><span id='main-title-span'>Ode's Food Poll</span><span id='main-descrpt-span'>Below are polls hosted by Ode<br>Select a poll to see the results and vote, or sign-in to make a new poll.</span></div>
     <div id='central-div'>
       <div id='div-1' class='ingre-type'><span class='ingre-name'>Meat</span></div>
       <div id='div-2' class='ingredients'><span class='ingre-name'>Steak</span></div>
       <div id='div-3' class='ingredients'><span class='ingre-name'>Fish</span></div>
       <div id='div-4' class='ingredients'><span class='ingre-name'>Lamb</span></div>
       <div id='div-5' class='ingredients'><span class='ingre-name'>Chicken</span></div>
       <div id='div-6' class='ingredients'><span class='ingre-name'>Pork</span></div>
       <div id='div-7' class='ingredients'><span class='ingre-name'>Shrimp</span></div>
       <div id='div-8' class='ingredients'><span class='ingre-name'>Crab</span></div>
       <div id='div-9' class='ingredients'><span class='ingre-name'>Shell Fish</span></div>
     </div>
     </div>";
?>
</body>
</html>