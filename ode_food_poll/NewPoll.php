<?php
     
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
     
     
     echo '<a id="twitterbtnsignout" href="TwitterLogout.php">Logout</a>';

?>

<link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />

<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Poll</h1><div id='home-div-in' class='block'><span class='block-span'>Home</span></div><div id='mypolls' class='block'><span id='mypolls-span' class='block-span'><center>My Polls</center></span><</div><div id='newpoll' class='block'><span id='newpoll-span' class='block-span'>New Poll</span><</div></div>
<div id='newpoll-main-div'><div id='newpoll-main-div-title'><span id='newpoll-main-title-span'>Make a New Poll:</span>
<div>
<br>
<br>
<br>
<div id="form-div"></div>
<form action="NewPoll.php">
   <select>
      <option value="Meat">Meat</option>
      <option value="Vegetable">Vegetable</option>
      <option value="Drink">Drink</option>
      <option value="Fruit">Fruit</option>
   </select>
  <h1 id="form-title">Foodname&nbsp(Max&nbsp56&nbspChars):</h1>
  

  <input id="input-title" name="title" type="text" maxlength="56" required>
 
  
  
  <input id="submit" type="submit" value="Submit">
  <div id="radio-div">
      <br>
      <input type="radio" name="radioservings" value="preset" checked><span class="radio-title"> (0,1,2,more than 3)</span> 
      <br>
      <br>
      <br>
      <input id="radiocustom" type="radio" name="radioservings" value="custom"><span class="radio-title"> Custom(please enter below):</span>
      <br>
      <br>
     <h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ( Less than <input id="customval1" class="customval" name="customvalues" type="number" min="1" max="10" readonly> , <input id="customval3" class="customval" name="customvalues" type="number" min="1" max="100" readonly> - <input id="customval2" class="customval" name="customvalues" type="number" min="1" max="100" readonly> , <input id="customval5" class="customval" name="customvalues" type="number" min="100" max="900" readonly> - <input id="customval4" class="customval" name="customvalues" type="number" min="100" max="900" readonly> , More than <input id="customval6" class="customval" name="customvalues" type="number" min="100" max="900" readonly> ) </h3>
  </div>
</form>
</div>
</div>
</div>
</div>
<div id="#ode-h5-div"><h5>This "Ode Food Poll" app is built by <a href="https://github.com/odekyc">@Ode</a> of freecodecamp<br><br> following the instructions of <a href="https://www.freecodecamp.com/challenges/build-a-voting-app">"Basejump: Build a Voting App | Free Code Camp"</a><br><br>Github repository: <a href="https://github.com/odekyc">https://github.com/odekyc</a><br><br>Code Pen: <a href="http://codepen.io/odekyc/">http://codepen.io/odekyc/</a></h5>
 </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
     $("#upper-div").css("width", "1300px");
    $("#newpoll-main-div").css("width", "1300px");
    
     $("#ode-h5-div").css("top", "1000px");
     
     $("h5").css("margin-top", "150px");
   
     $("#newpoll-main-div").css({"position" : "relative",
        "margin" : "auto",
        "margin-top" : "30px"
    });
   
    $("#home-div-in").click(function(){ 
        window.location.href = "LoggedIn.php";
        $('#home-div-in').css("background-color", "#e5ffcc");
        $('#home-div-out').css("background-color", "#e5ffcc");
         $('#newpoll').css("background-color", "orange");
    });
    
    $("#mypolls").click(function(){
        window.location.href = "MyPolls.php";
        $('#home-div-in').css("background-color", "#e5ffcc");
        $('#home-div-out').css("background-color", "#e5ffcc");
        $('#mypolls').css("background-color", "#ace600");
    });
    $('html').height("1200px");
    $('#home-div-in').css("background-color", "#e5ffcc");
    $('#home-div-in').hover(function(){   $('#home-div-in').css("background-color", "#ace600");} , function(){ $('#home-div-in').css("background-color", "#e5ffcc"); });
    $('#newpoll').css("background-color", "#ace600");
    
</script>

