<?php
     
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
     
     
     echo '<a id="twitterbtnsignout" href="TwitterLogout.php">Logout</a>';

?>

<link rel='stylesheet' type='text/css' href='stylesheet.css' />

<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Poll</h1><div id='home-div-in' class='block'><span class='block-span'>Home</span></div><div id='mypolls' class='block'><span id='mypolls-span' class='block-span'><center>My Polls</center></span><</div><div id='newpoll' class='block'><span id='newpoll-span' class='block-span'>New Poll</span><</div></div>
<div id='mypolls-main-div'> <div id='main-div-title'><span id='main-title-span'>Ode's Food Poll</span><span id='main-descrpt-span'>Below are polls you own<br>Select a poll to see the results of your polls, or <a href="NewPoll.php">make a new poll</a>.</span></div>
<h5 id="underscript-mypoll">This "Ode Food Poll" app is built by <a href="https://github.com/odekyc">@Ode</a> of freecodecamp<br><br> following the instructions of <a href="https://www.freecodecamp.com/challenges/build-a-voting-app">"Basejump: Build a Voting App | Free Code Camp"</a><br><br>Github repository: <a href="https://github.com/odekyc">https://github.com/odekyc</a><br><br>Code Pen: <a href="http://codepen.io/odekyc/">http://codepen.io/odekyc/</a></h5>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    var NumMyPolls=0;
    var height= NumMyPolls*20+120;
    $('html').height(height+"%");
    $('#home-div-in').css("background-color", "#99ceff");
    $('#home-div-in').hover(function(){   $('#home-div-in').css("background-color", "#ace600");} , function(){ $('#home-div-in').css("background-color", "#99ceff"); });
    $('#mypolls').css("background-color", "#ace600");
    
</script>

<?php

  

?>