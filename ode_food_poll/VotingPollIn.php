<head>
     <link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="https://d3js.org/d3.v3.min.js"></script>

</head>

<?php
     
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';
     
     
     echo '<a id="twitterbtnsignout" href="VotingPollOut.php">Logout</a>';
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

    session_start();
    // Create connection
    
         
      if(!$_GET['click_id']){
        $_GET['click_id']=$_SESSION['click_id'];
      }
       else{
          $_SESSION["click_id"]=$_GET['click_id'];
      }
      
      
     $click_id=$_GET['click_id'];

    $conn = new mysqli($servername, $username, $password, $database, $dbport);
    
     $sql = "SELECT actual_serving_count FROM food_list WHERE id=".$click_id;
 
       
      $result=mysqli_query($conn, $sql);
      
     $row=mysqli_fetch_array($result,MYSQLI_NUM);
     
     $serving_ct_data= $row[0]; 
          

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
  
      $conn->close();
    
  
?>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Poll</h1><div id='home-div-in' class='block'><span class='block-span'>Home</span></div><div id='mypolls' class='block'><span id='mypolls-span' class='block-span'><center>My Polls</center></span><</div><div id='newpoll' class='block'><span id='newpoll-span' class='block-span'>New Poll</span><</div></div>  
     <div id='voting-poll-div'><div id="chart"></div></div>

<h5 id="underscript-newpoll">This "Ode Food Poll" app is built by <a href="https://github.com/odekyc">@Ode</a> of freecodecamp<br><br> following the instructions of <a href="https://www.freecodecamp.com/challenges/build-a-voting-app">"Basejump: Build a Voting App | Free Code Camp"</a><br><br>Github repository: <a href="https://github.com/odekyc">https://github.com/odekyc</a><br><br>Code Pen: <a href="http://codepen.io/odekyc/">http://codepen.io/odekyc/</a></h5>
<script type='text/javascript'>
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
        
        $("#home-div-in").click(function(){ 
        window.location.href = "LoggedIn.php";
        $('#home-div-in').css("background-color", "#ace600");
         $('#newpoll').css("background-color", "orange");
    });
    
        
    $("#twitterbtnsignout").click(function(){ 
        window.location.href = "NotLoggedIn.php";
        });
    
       $('h5').css('top','1100px');
       $('html').css('height', '1300px');
       
       $('#voting-poll-div').css('height', '900px');
       
        $('#voting-poll-div').css('width', '1300px');
       
       $('#voting-poll-div').css('left', '56px');
       

       
       var width=700,
           height=700,
           radius=350,
           colors= d3.scale.category10();
           
       var serving_counts="<?php echo $serving_ct_data?>";
       
       var serving_counts=serving_counts.slice(1,serving_counts.length-1);
       
       var serving_counts_arr=serving_counts.split(",");
       
       
           
       var piedata= [
              { 
                  value : serving_counts_arr[0]
              },
              { 
                  value : serving_counts_arr[1]
              },
            { 
                  value : serving_counts_arr[2]
              },
              { 
                  value : serving_counts_arr[3]
              }
           ];
           
           
        var pie = d3.layout.pie()
                  .value(function(d){
                      return d.value;
                  });
                  
        var arc= d3.svg.arc()
                .outerRadius(radius);
                
        var myChart = d3.select('#chart').append('svg')
           .attr('width', width)
           .attr('height', height)
           .append('g')
           .attr('transform', 'translate('+(width - radius )+ ',' + (height-radius) +')')
           .selectAll('path').data(pie(piedata))
           .enter().append('path')
           .attr('fill', function(d,i){
               return colors(i);
           })
           .attr( 'd', arc);
           
     </script>

