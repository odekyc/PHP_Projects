<?php
    
     
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
     include 'database.php';
     
      session_start();

     echo '<a id="twitterbtnsignout" href="TwitterLogout.php">Logout</a>';
     
     // $servername = getenv('IP');
     // $username = getenv('C9_USER');
     // $password = "";
     // $database = "ode_food_poll";
     // $dbport = 3306;
    

    $servername = $cleardb_server;
    $username = $cleardb_username;
    $password = $cleardb_password;
    $database = $cleardb_db;
    $dbport = 3306;

     $conn = new mysqli($servername, $username, $password, $database, $dbport);
     
     $_SESSION['mypoll-deleted']=false;
     
   
?>

<link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />

<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Polls</h1><div id='home-div-in' class='block'><span class='block-span'>Home</span></div><div id='mypolls' class='block'><span id='mypolls-span' class='block-span'><center>My Polls</center></span><</div><div id='newpoll' class='block'><span id='newpoll-span' class='block-span'>New Poll</span><</div></div>
<div id='newpoll-main-div'><div id='newpoll-main-inner-div'><span id='newpoll-main-title-span'>Make a New Poll:</span>
<div>
<br>
<br>
<br>
<div id="form-div">
<form action="NewPollSubmit.php" method="post">
    <input id="submit" type="submit" value="Submit">
   <select name="category">
      <option value="Meat">Meat</option>
      <option value="Seafood">Seafood</option>
      <option value="Vegetable">Vegetable</option>
      <option value="Beverage">Beverage</option>
      <option value="Fruit">Fruit</option>
      <option value="Grains">Grains</option>
      <option value="Sweets">Sweets</option>
      <option value="Others">Others</option>
   </select>
   
   
  <h1 id="form-title">Foodname&nbsp(Max&nbsp56&nbspChars):</h1>
  

  <input id="foodname-form" name="foodname" type="text" maxlength="56" required>
 <br>
 <div id="serving-stnd">
  <h1 id="serving-stnd-title">Serving Standard:</h1>
  <h1><input id="serving-stnd-input" name="serving-stnd" type="text" maxlength="30" required>(s)</h1>
 </div> 
  
  <div id="radio-div">
      <br>
      <input id="radiopreset" type="radio" name="radioservings" value="preset" checked><span class="radio-title"> (0,1,2,more than 2)</span> 
      <br>
      <br>
      <br>
      <input id="radiocustom" type="radio" name="radioservings" value="custom"><span class="radio-title"> Custom(please enter below):</span>
      <br>
      <br>
    <h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ( Less than <input id="customval1" class="customval" name="customvalue1" type="number" min="1" max="100" readonly required> , <input id="customval2" class="customval" name="customvalue2" type="number" min="1" max="900" readonly required> - <input id="customval3" class="customval" name="customvalue3" type="number" min="1" max="900" readonly required> , <input id="customval4" class="customval" name="customvalue4" type="number" min="1" max="900" readonly required> - <input id="customval5" class="customval" name="customvalue5" type="number" min="1" max="900" readonly required> , More than <input id="customval6" class="customval" name="customvalue6" type="number" min="1" max="900" readonly required> ) </h3>
  
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
   
     $("#ode-h5-div").css("top", "1200px");
     
     $("h5").css("margin-top", "190px");
     
     $("#radiocustom").click(function(){
         $(".customval").css("background-color", "white");
         $(".customval").removeAttr("readonly");
     });
   
      $("#radiopreset").click(function(){
         $(".customval").css("background-color", "gray");
         $(".customval").attr("readonly", "readonly");
     });
          $("#newpoll-main-div").css({"position" : "relative",
                "margin" : "auto",
                "margin-top" : "30px"
            });
    $("#home-div-in").click(function(){ 
        window.location.href = "LoggedIn.php?oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";

        $('#home-div-in').css("background-color", "#e5ffcc");
        $('#home-div-out').css("background-color", "#e5ffcc");
         $('#newpoll').css("background-color", "orange");
    });
    
    $("#mypolls").click(function(){
        window.location.href = "MyPolls.php?oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";
        $('#home-div-in').css("background-color", "#e5ffcc");
        $('#home-div-out').css("background-color", "#e5ffcc");
        $('#mypolls').css("background-color", "#ace600");
    });
    $('html').height("1400px");
    $('#home-div-in').css("background-color", "#e5ffcc");
    $('#home-div-in').hover(function(){   $('#home-div-in').css("background-color", "#ace600");} , function(){ $('#home-div-in').css("background-color", "#e5ffcc"); });
    $('#newpoll').css("background-color", "#ace600");
    

    
</script>




<?php

   
   if (isset($_POST["servings"])){
       
    
     
    
    $servings=$_POST["servings"];
    
    if($servings == 1){
        $actual_serving_count="(1,0,0,0)";
    }
    else if($servings == 2){
        $actual_serving_count="(0,1,0,0)";
    }
    else if($servings == 3){
        $actual_serving_count="(0,0,1,0)";
    }
    else if($servings == 4){
        $actual_serving_count="(0,0,0,1)";
    
    }
    $which_radio=$_SESSION["whichradio"];
    
    if($which_radio== "preset"){
        $serving_sizes="(0,1,2,more than 2)";
    }
    else if($which_radio== "custom"){
        $serving_sizes="(less than ".$_SESSION["customval1"].",".$_SESSION["customval2"]."-".$_SESSION["customval3"].",".$_SESSION["customval4"]."-".$_SESSION["customval5"].",more than ".$_SESSION["customval6"].")";
    }
    
    
    $foodname_valid_sql="SELECT * FROM food_list WHERE foodname='".$_SESSION["foodname"]."'";
    $foodname_valid_result=mysqli_query($conn, $foodname_valid_sql);
    
      if ($foodname_valid_result === TRUE) {
              if($_SESSION['dbupdated']="success"){
                $_SESSION['dbupdated']="success";
              }
              elseif($_SESSION['dbupdated']="fail"){
                  $_SESSION['dbupdated']="fail";
              }
          } else {
              $_SESSION['dbupdated']="fail";
              $_SESSION['dbupdate-error']= $conn->error;
          }
          
     
    
    if ($foodname_valid_result->num_rows == 0) {
    
        $insert_foodlist_sql = "INSERT INTO food_list (category, foodname, serving_standard, serving_sizes, actual_serving_count,  usermade, creator_username) VALUES ('".$_SESSION["category"]."','".$_SESSION["foodname"]."','".$_SESSION["serving-stnd"]."','".$serving_sizes."','".$actual_serving_count."','yes','".$_SESSION["username"]."')";
        $insert_foodlist_result=mysqli_query($conn, $insert_foodlist_sql);
        
          if ($insert_foodlist_result === TRUE) {
              if($_SESSION['dbupdated']="success"){
                $_SESSION['dbupdated']="success";
              }
              elseif($_SESSION['dbupdated']="fail"){
                  $_SESSION['dbupdated']="fail";
              }
          } else {
              $_SESSION['dbupdated']="fail";
              $_SESSION['dbupdate-error']= $conn->error;
          }
          
        $newfood_id_sql="SELECT id FROM food_list WHERE foodname='".$_SESSION["foodname"]."'";
        $newfood_id_result=mysqli_query($conn, $newfood_id_sql);
        
          if ($newfood_id_result === TRUE) {
              if($_SESSION['dbupdated']="success"){
                $_SESSION['dbupdated']="success";
              }
              elseif($_SESSION['dbupdated']="fail"){
                  $_SESSION['dbupdated']="fail";
              }
          } else {
              $_SESSION['dbupdated']="fail";
              $_SESSION['dbupdate-error']= $conn->error;
          }
          
        
        $newfood_id_row = mysqli_fetch_array($newfood_id_result,MYSQLI_ASSOC);
        $newfood_id=$newfood_id_row['id'];
          
      $insert_userpolls_sql = "INSERT INTO user_polls (username, foodname, serving_standard, serving_sizes, profile_pic, category, food_list_id) VALUES ('".$_SESSION["username"]."','".$_SESSION["foodname"]."','".$_SESSION["serving-stnd"]."','".$_SESSION["serving-sizes"]."','".$_SESSION["profilepic"]."','".$_SESSION["category"]."','".$newfood_id."')";
      $insert_result=mysqli_query($conn, $insert_userpolls_sql);
      
      if ($insert_result === TRUE) {
          $_SESSION['dbupdated']="success";
      } else {
          $_SESSION['dbupdated']="fail";
          $_SESSION['dbupdate-error']= $conn->error;
      }
          
       
        
      
        
        $insert_uservotes_sql="INSERT INTO user_votes (foodname, vote, username, food_list_id) VALUES ('".$_SESSION["foodname"]."','".$servings."','".$_SESSION["username"]."','".$newfood_id."')";
        $insert_uservotes_result=mysqli_query($conn, $insert_uservotes_sql);
        
          if ($insert_uservotes_result === TRUE) {
              if($_SESSION['dbupdated']="success"){
                $_SESSION['dbupdated']="success";
              }
              elseif($_SESSION['dbupdated']="fail"){
                  $_SESSION['dbupdated']="fail";
              }
          } else {
              $_SESSION['dbupdated']="fail";
              $_SESSION['dbupdate-error']= $conn->error;
          }
          
        $insert_usersaved_sql="INSERT INTO user_saved (creator_username, foodname, saver_username, food_list_id , category) VALUES ('".$_SESSION["username"]."','".$_SESSION["foodname"]."','".$_SESSION["username"]."','".$newfood_id."','".$_SESSION["category"]."')";
        $insert_usersaved_result=mysqli_query($conn, $insert_usersaved_sql);
        
          if ($insert_usersaved_result === TRUE) {
              if($_SESSION['dbupdated']="success"){
                $_SESSION['dbupdated']="success";
              }
              elseif($_SESSION['dbupdated']="fail"){
                  $_SESSION['dbupdated']="fail";
              }
          } else {
              $_SESSION['dbupdated']="fail";
              $_SESSION['dbupdate-error']= $conn->error;
          }
          
       
    }
    elseif($foodname_valid_result->num_rows > 0) {
        $_SESSION['dbupdated']="alreadyexist";
    }
   }

  if($_SESSION['dbupdated']=="success"){
      $_SESSION['dbupdated']="none";
        echo "<div id='dbupdate-status-div'><h1 id='dbupdate-status-h1'><CENTER>This Vote Has Been Updated in Database Successfully</CENTER></h1></div>";
  }
 elseif($_SESSION['dbupdated']=="alreadyexist"){
        $_SESSION['dbupdated']="none";
        echo "<div id='dbupdate-status-div'><h1 id='dbupdate-status-h1'><CENTER>This Food Name Already Exists in Poll Database</CENTER></h1></div>";

 }
  elseif($_SESSION['dbupdated']=="fail"){
        $_SESSION['dbupdated']="none";
        echo "<div id='dbupdate-status-div'><h1 id='dbupdate-status-h1'><CENTER>Database Connection Error".$_SESSION['dbupdate-error']."</CENTER></h1></div>";
  }

?>