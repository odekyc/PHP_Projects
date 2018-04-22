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
     
     
     $twitterObj = new EpiTwitter($consumerKey1, $consumerSecret1);
     
     session_start();
     
     
     $_SESSION['whichupdatevote']="regular";
     
     $_SESSION['mypoll-deleted']=false;
     
    
     
       
      
     echo "<link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />"; 
  
     echo '<a id="twitterbtnsignin" href="' . $twitterObj->getAuthenticateUrl() . '">
     <img src="twitterlogin.png" alt="sign in with twitter" />
     </a>';
     
     $_SESSION['dbupdated']="none";
    $_SESSION['dbupdate-error']= "";
    
    $_SESSION['hi']=$_GET['oauth_token'];
    
    if(isset($_GET['oauth_token']) || (isset($_COOKIE['oauth_token']) && isset($_COOKIE['oauth_token_secret'])))
    {
           
        $oauth_token = $_GET['oauth_token'];
         $oauth_verifier = $_GET['oauth_verifier'];
    
        $_SESSION['oauth_token'] = $_GET['oauth_token'];
        $_SESSION['oauth_verifier'] = $_GET['oauth_verifier'];
    
        $twitterObj->setToken($_GET['oauth_token']);
        $token = $twitterObj->getAccessToken();
        $twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);
        $_SESSION['ot'] = $token->oauth_token;
        $_SESSION['ots'] = $token->oauth_token_secret;
        $twitterInfo= $twitterObj->get_accountVerify_credentials();
        $twitterInfo->response;

        $username = $twitterInfo->screen_name;
        $profilepic = $twitterInfo->profile_image_url;
 
        $_SESSION['username'] = $username;
        $_SESSION['profilepic'] = $profilepic;

        
        
        $header_str="Location: LoggedIn.php?oauth_token=".$oauth_token."&oauth_verifier=".$oauth_verifier; 
     
                header($header_str);
        }
     
   

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

 // $servername = 'localhost:3306';
 //    $username = 'root';
 //    $password = "";
 //    $database = "ode_food_poll";
 //    $dbport = 3306;

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

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Polls</h1><div id='home-div-out' class='block'><span class='block-span'>Home</span></div></div> 
     <div id='main-div'><div id='main-div-title'><span id='main-title-span'>Ode's Food Polls</span><span id='main-descrpt-span'>Below are polls hosted by Ode<br>Select a poll to see the results and vote, or sign-in to make a new poll.</span></div>
     <div id='central-div' ng-app="myApp" ng-controller="myCtrl">
        <?php
             $sql = "SELECT * FROM food_list ORDER BY category ASC";
            $result = $conn->query($sql);
            $cur_category=array("Beverage");
            echo "<div class='ingre-type'><span class='ingre-name'>Beverage</span></div>";
            $bigrow_count=1;
            $smallrow_count=0;
            if ($result->num_rows > 0) {
                // output data of each row
               echo $_SESSION['hi'];
                while($row = $result->fetch_assoc()) {
                    
                    if( !in_array($row["category"], $cur_category)){
                        
                        $bigrow_count+=1;
                        array_push($cur_category, $row["category"]);
                         echo "<div class='ingre-type'><span class='ingre-name'>".$cur_category[$bigrow_count-1]."</span></div>";
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
            echo "<script type='text/javascript'>
            $('#ode-h5-div').css('top','".$h5_top."px');
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
   
   $(".ingre-type").click(function(){
         var id=$(this).attr('id');
        
        var id=id.split("-")[1];
        alert(id);
    });
    </script>
    
    
