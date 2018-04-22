<head>
     <link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<?php
     
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
     include 'database.php';

     session_start();
     
     echo '<a id="twitterbtnsignout" href="TwitterLogout.php">Logout</a>';
     $_SESSION['dbupdated']="none";
    $_SESSION['dbupdate-error']= "";
    $_SESSION['mypoll-deleted']=false;
    
    
  

?>

 <?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.
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

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database, $dbport);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    
?>


<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Polls</h1><div id='home-div-in' class='block'><span class='block-span'>Home</span></div><div id='mypolls' class='block'><span id='mypolls-span' class='block-span'><center>My Polls</center></span><</div><div id='newpoll' class='block'><span id='newpoll-span' class='block-span'>New Poll</span></div></div>
<div id='mypolls-main-div'><div id='main-div-title'><span id='main-title-span'>My Food Polls</span><span id='main-descrpt-span'>Below are polls you own<br>Select a poll to see the results of your polls, or <a style="color:#80ffbf;" href="NewPoll.php?oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>"
>make a new poll</a>.</span></div>

<div id='central-div'>
    <div id='userpolls-div'><span class='ingre-name'>User Made Polls</span></div>
<?php

      $userpolls_sql = "SELECT * FROM food_list WHERE creator_username = '".$_SESSION["username"]."' ORDER BY category ASC";
      $userpolls_result = $conn->query($userpolls_sql);
      $cur_category="";
      
      $bigrow_count=0;
      $smallrow_count=0;
       
      if ($userpolls_result->num_rows > 0) {
        // output data of each row
    
         while($row = $userpolls_result->fetch_assoc()) {
            $bigrow_count+=1;
            if($row["category"]!== $cur_category){
                $bigrow_count+=1;
                $cur_category=$row["category"];
                 echo "<div class='userpolls-ingre-type'><span class='ingre-name'>".$cur_category."</span></div>";
            }
            echo "<div id='div-".$row["id"]."' class='userpolls-ingredients'><span class='ingre-name'>". $row["foodname"]."</span></div>";
    
         }
       } else {
        echo "0 results";
       }
?>



<?php
    
    $usersaved_alreadyshown=array();
    
     echo "<div id='uservotes-div'><span class='ingre-name'>Other Polls User Has Voted On</span></div>";
     
     $bigrow_count+=1;
      $usersaved_sql = "SELECT * FROM user_saved Where saver_username = '".$_SESSION["username"]."' AND creator_username != '".$_SESSION["username"]."' ORDER BY category ASC";
      $usersaved_result = $conn->query($usersaved_sql);
      $cur_category="";
 
      if ($usersaved_result->num_rows > 0) {
        // output data of each row
       
         while($row = $usersaved_result->fetch_assoc()) {
            
            if($row["category"]!== $cur_category){
                $bigrow_count+=1;
                $cur_category=$row["category"];
                echo "<div class='uservotes-ingre-type'><span class='ingre-name'>".$cur_category."</span></div>";
            }
            if(in_array($row["foodname"],$usersaved_alreadyshown)){
                
            }
            else{
                 array_push($usersaved_alreadyshown,$row["foodname"]);
                 $smallrow_count+=1;
                 echo "<div id='div-".$row["food_list_id"]."' class='uservotes-ingredients'><span class='ingre-name'>". $row["foodname"]."</span></div>";
           
            }
           
         }
       } else {
        echo "0 results";
       }
       
        $main_div_newh=80*$bigrow_count+50*$smallrow_count+70+100+640;
        $h5_top=$main_div_newh+250;
        $html_newh=$main_div_newh+460+100+900;
        
        
        echo "<script type='text/javascript'>$('#mypolls-main-div').height('".$main_div_newh."px');
          
          $('html').height('".$html_newh."px');
        </script>";
        
        
        $conn->close();
            
?>

</div>

</div>
<div id="ode-h5-div"><h5>This "Ode Food Poll" app is built by <a href="https://github.com/odekyc">@Ode</a> of freecodecamp<br><br> following the instructions of <a href="https://www.freecodecamp.com/challenges/build-a-voting-app">"Basejump: Build a Voting App | Free Code Camp"</a><br><br>Github repository: <a href="https://github.com/odekyc">https://github.com/odekyc</a><br><br>Code Pen: <a href="http://codepen.io/odekyc/">http://codepen.io/odekyc/</a></h5>
</div>

     <?php 
            echo "<script type='text/javascript'>
            $('#ode-h5-div').css('top','".$h5_top."px');
            </script>";
    ?>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">

    var username="<?php echo $_SESSION['username'] ?>";
    
    $("#upper-div").css("width", "1300px");
    $("#mypolls-main-div").css("width", "1300px");
    $("#main-title-span").css("left", "240px");
    
     $("#userpolls-div span").text(username+" Made Polls");
     
     $("#uservotes-div span").text("Other Polls "+username+" Saved");
    
      $("#mypolls-main-div").css({"position" : "relative",
        "margin" : "auto",
        "margin-top" : "30px"
    });
    
     $(".uservotes-ingredients").click(function(){
         var id=$(this).attr('id');
        
        var id=id.split("-")[1];
       
      window.location.href = "MyPollVotingPollSaved.php?click_id="+id+"&oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";
  
       });
       
       
     $(".userpolls-ingredients").click(function(){
         var id=$(this).attr('id');
        
        var id=id.split("-")[1];
       
      window.location.href = "MyPollVotingPollUsermade.php?click_id="+id+"&oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";
  
       });
       
   
    $("#newpoll").click(function(){ 
        window.location.href = "NewPoll.php?oauth_token="+"<?php echo $_SESSION["oauth_token"]; ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"]; ?>";

        $('#home-div-in').css("background-color", "#e5ffcc");
        $('#home-div-out').css("background-color", "#e5ffcc");
         $('#newpoll').css("background-color", "#ace600");
    });
    
     $("#home-div-in").click(function(){ 
        window.location.href = "LoggedIn.php?oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";

        $('#home-div-in').css("background-color", "#e5ffcc");
        $('#home-div-out').css("background-color", "#e5ffcc");
         $('#newpoll').css("background-color", "orange");
    });
    var NumMyPolls=0;
    var height= NumMyPolls*20+120;
    $('html').height(height+"%");
    $('#home-div-in').css("background-color", "#e5ffcc");
    $('#home-div-in').hover(function(){   $('#home-div-in').css("background-color", "#ace600");} , function(){ $('#home-div-in').css("background-color", "#e5ffcc"); });
    $('#mypolls').css("background-color", "#ace600");
    
</script>

