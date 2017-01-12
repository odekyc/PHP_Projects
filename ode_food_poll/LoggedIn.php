<head>
     <link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<?php
     
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
     
     
     echo '<a id="twitterbtnsignout" href="TwitterLogout.php">Logout</a>';
      echo "<link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />"; 
     
  
?>

 <?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "ode_food_poll";
    $dbport = 3306;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
  
    
?>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Poll</h1><div id='home-div-in' class='block'><span class='block-span'>Home</span></div><div id='mypolls' class='block'><span id='mypolls-span' class='block-span'><center>My Polls</center></span><</div><div id='newpoll' class='block'><span id='newpoll-span' class='block-span'>New Poll</span><</div></div>
     <div id='main-div'><div id='main-div-title'><span id='main-title-span'>Ode's Food Poll</span><span id='main-descrpt-span'>Below are polls hosted by Ode<br>Select a poll to see the results and vote, or sign-in to make a new poll.</span></div>
     <div id='central-div'>
       <?php
             $sql = "SELECT * FROM food_list";
            $result = $conn->query($sql);
            $cur_category="Meat";
            echo "<div id='div-1' class='ingre-type'><span class='ingre-name'>Meat</span></div>";
            $row_count=0;
            if ($result->num_rows > 0) {
                // output data of each row
               
                while($row = $result->fetch_assoc()) {
                    $row_count+=1;
                    if($row["category"]!== $cur_category){
                        $cur_category=$row["category"];
                         echo "<div id='div-".$row["id"]."' class='ingre-type'><span class='ingre-name'>".$cur_category."</span></div>";
                    }
                    echo "<div id='div-".$row["id"]."' class='ingredients'><span class='ingre-name'>". $row["foodname"]."</span></div>";
            
                }
            } else {
                echo "0 results";
            }
            
            $main_div_newh=70*$row_count-60;
            $h5_top=$main_div_newh+200;
            $html_newh=$main_div_newh+360;
            
            
            echo "<script type='text/javascript'>$('#main-div').height('".$main_div_newh."px');
              
              $('html').height('".$html_newh."px');
            </script>";
            $conn->close();
            
       ?>
     </div>
     </div>
      <h5>This "Ode Food Poll" app is built by <a href="https://github.com/odekyc">@Ode</a> of freecodecamp<br><br> following the instructions of <a href="https://www.freecodecamp.com/challenges/build-a-voting-app">"Basejump: Build a Voting App | Free Code Camp"</a><br><br>Github repository: <a href="https://github.com/odekyc">https://github.com/odekyc</a><br><br>Code Pen: <a href="http://codepen.io/odekyc/">http://codepen.io/odekyc/</a></h5>
      <?php
        echo"<script>$('h5').css('top','".$h5_top."px');</script>";
      ?>
 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
      
    $(".ingredients").click(function(){
        window.location.href = "VotingPollIn.php";
    });
    
    $("#upper-div").css("width", "1300px");
    $("#main-div").css("width", "1300px");
   
   
    $("#mypolls").click(function(){
        window.location.href = "MyPolls.php";
        $('#home-div-in').css("background-color", "#99ceff");
        $('#mypolls').css("background-color", "#ace600");
    });

    $("#newpoll").click(function(){ 
        window.location.href = "NewPoll.php";
        $('#home-div-in').css("background-color", "#99ceff");
         $('#newpoll').css("background-color", "#ace600");
        });
    </script>
     
