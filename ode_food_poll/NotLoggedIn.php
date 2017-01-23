<head>
     <link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<?php
    
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
     $Twitter = new EpiTwitter($consumerKey1, $consumerSecret1);
     
     session_start();
     
      
     echo "<link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />"; 
  
     echo '<a id="twitterbtnsignin" href="' . $Twitter->getAuthenticateUrl() . '">
     <img src="twitterlogin.png" alt="sign in with twitter" />
     </a>';
     
    if(isset($_GET['oauth_token']))
     {
             header("Location: LoggedIn.php");
     }
     
       
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
<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Poll</h1><div id='home-div-out' class='block'><span class='block-span'>Home</span></div></div> 
     <div id='main-div'><div id='main-div-title'><span id='main-title-span'>Ode's Food Poll</span><span id='main-descrpt-span'>Below are polls hosted by Ode<br>Select a poll to see the results and vote, or sign-in to make a new poll.</span></div>
     <div id='central-div' ng-app="myApp" ng-controller="myCtrl">
       <?php
             $sql = "SELECT * FROM food_list ORDER BY category ASC";
            $result = $conn->query($sql);
            $cur_category="Beverage";
            echo "<div id='div-1' class='ingre-type'><span class='ingre-name'>Beverage</span></div>";
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
            
            $main_div_newh=60*$row_count-60;
            $h5_top=$main_div_newh+200;
            $html_newh=$main_div_newh+360;
            
             
            
            echo "<script type='text/javascript'>$('#main-div').height('".$main_div_newh."px');
              $('h5').css('top','20px');
              $('html').height('".$html_newh."px');
            </script>";
            $conn->close();
            
    ?>
     
     </div>
     </div>
      <h5>This "Ode Food Poll" app is built by <a href="https://github.com/odekyc">@Ode</a> of freecodecamp<br><br> following the instructions of <a href="https://www.freecodecamp.com/challenges/build-a-voting-app">"Basejump: Build a Voting App | Free Code Camp"</a><br><br>Github repository: <a href="https://github.com/odekyc">https://github.com/odekyc</a><br><br>Code Pen: <a href="http://codepen.io/odekyc/">http://codepen.io/odekyc/</a></h5>
     <?php 
            echo "<script type='text/javascript'>
            $('h5').css('top','".$h5_top."px');
            </script>";
    ?>
    
    <script>
    
        var app = angular.module("myApp", []);
        
        app.controller("myCtrl", function($scope) {
        
        });
        
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
    
     $("#home-div-out").css("background-color", "#ace600"); 
    
    $(".ingredients").click(function(){
        
        var id=$(this).attr('id');
        
        var id=id.split("-")[1];
    
       
       window.location.href = "VotingPollOut.php?click_id="+id;
       
       
    });
    
    $(".ingredients").css("background-color","#e5ffcc");
    
    $("#upper-div").css("width", "1300px");
    $("#main-div").css("width", "1300px");
    $("#main-div").css({"position" : "relative",
        "margin" : "auto",
        "margin-top" : "30px"
    });
   
    </script>
