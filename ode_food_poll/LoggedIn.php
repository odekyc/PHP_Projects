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
      echo "<link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />"; 
     
     $_SESSION['whichupdatevote']="regular";
  
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
    
     $_SESSION['dbupdated']="none";
    $_SESSION['dbupdate-error']= "";
    $_SESSION['mypoll-deleted']=false;
    
?>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Polls</h1><div id='home-div-in' class='block'><span class='block-span'>Home</span></div><div id='mypolls' class='block'><span id='mypolls-span' class='block-span'><center>My Polls</center></span><</div><div id='newpoll' class='block'><span id='newpoll-span' class='block-span'>New Poll</span><</div></div>
     <div id='main-div'><div id='main-div-title'><span id='main-title-span'>Ode's Food Polls</span><span id='main-descrpt-span'>Below are polls hosted by Ode<br>Select a poll to see the results and vote, or sign-in to make a new poll.</span></div>
     <div id='central-div'>
       <?php
             $sql = "SELECT * FROM food_list ORDER BY category ASC";
            $result = $conn->query($sql);
            $cur_category=array("Beverage");
            echo "<div class='ingre-type'><span class='ingre-name'>Beverage</span></div>";
            $bigrow_count=1;
            $smallrow_count=0;
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    
                    if(!in_array($row["category"], $cur_category)){
                        $bigrow_count+=1;
                        array_push($cur_category, $row["category"]);
                        echo "<div class='ingre-type'><span class='ingre-name'>".
                        $cur_category[$bigrow_count-1]."</span></div>";
                    }
                    $smallrow_count+=1;
                    echo "<div id='div-".$row["id"]."' class='ingredients'><span class='ingre-name'>". $row["foodname"]."</span></div>";
            
                }
            } else {
                echo "0 results";
            }
            
           $main_div_newh=80*$bigrow_count+50*$smallrow_count+70+570;
            $h5_top=$main_div_newh+250;
            $html_newh=$main_div_newh+460;
            
            echo "<script type='text/javascript'>$('#main-div').height('".$main_div_newh."px');
              
              $('html').height('".$html_newh."px');
            </script>";
            $conn->close();
            
       ?>
     </div>
     </div>
      <div id="ode-h5-div"><h5>This "Ode Food Poll" app is built by <a href="https://github.com/odekyc">@Ode</a> of freecodecamp<br><br> following the instructions of <a href="https://www.freecodecamp.com/challenges/build-a-voting-app">"Basejump: Build a Voting App | Free Code Camp"</a><br><br>Github repository: <a href="https://github.com/odekyc">https://github.com/odekyc</a><br><br>Code Pen: <a href="http://codepen.io/odekyc/">http://codepen.io/odekyc/</a></h5>
      </div>
      <?php
        echo"<script>$('#ode-h5-div').css('top','".$h5_top."px');</script>";
      ?>
 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
      
      $("#home-div-in").css("background-color", "#ace600"); 
      
    $(".ingredients").click(function(){
         var id=$(this).attr('id');
        
        var id=id.split("-")[1];
       
      window.location.href = "VotingPollIn.php?click_id="+id+"&oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";
  
       
       
    });
    
 
    
    
    $(".ingredients").css("background-color"," #e5ffcc");
    
    $("#upper-div").css("width", "1300px");

     $("#main-div").css({"position" : "relative",
        "margin" : "auto",
        "margin-top" : "30px"
    });
   
    $("#mypolls").click(function(){
        window.location.href = "MyPolls.php?oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";
        $('#home-div-in').css("background-color", "#99ceff");
        $('#mypolls').css("background-color", "#ace600");
    });

    $("#newpoll").click(function(){ 
        window.location.href = "NewPoll.php?oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";
  
        $('#home-div-in').css("background-color", "#99ceff");
         $('#newpoll').css("background-color", "#ace600");
        });
   
</script>