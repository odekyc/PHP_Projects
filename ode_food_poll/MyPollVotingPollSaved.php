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
     include 'database.php';

     session_start();
     
     $_SESSION['whichupdatevote']="saved";
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
    
         
      if(!$_GET['click_id']){
        $_GET['click_id']=$_SESSION['click_id'];
      }
       else{
          $_SESSION["click_id"]=$_GET['click_id'];
      }
      
      
     $click_id=$_GET['click_id'];
     
     $_SESSION['which_page']="In";
     
     $signout_href="VotingPollOut.php?click_id=".$click_id;  
     
     echo '<a id="twitterbtnsignout" href='.$signout_href.'>Logout</a>';
      echo "<link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />"; 
     

    $conn = new mysqli($servername, $username, $password, $database, $dbport);
    
     $actual_ct_sql = "SELECT actual_serving_count FROM food_list WHERE id=".$click_id;
     
     $serving_sz_sql = "SELECT serving_sizes FROM food_list WHERE id=".$click_id;
 
      $foodname_sql = "SELECT foodname FROM food_list WHERE id=".$click_id;
      
      $serving_std_sql = "SELECT serving_standard FROM food_list WHERE id=".$click_id;
      
       $usersaved_sql = "SELECT * FROM user_saved WHERE saver_username = '".$_SESSION["username"]."' AND food_list_id =".$click_id; 
       
      $actual_ct_result=mysqli_query($conn, $actual_ct_sql);
      
      $foodname_result=mysqli_query($conn, $foodname_sql);
      
     $serving_sz_result=mysqli_query($conn, $serving_sz_sql);
     
      $serving_std_result=mysqli_query($conn, $serving_std_sql);
      
      $usersaved_result=mysqli_query($conn, $usersaved_sql);
      
      if ($usersaved_result->num_rows > 0) {
           $usersaved_data="checked";
      }
      elseif ($usersaved_result->num_rows == 0) {
           $usersaved_data="unchecked";
      }
      
     $actual_ct_row=mysqli_fetch_array($actual_ct_result,MYSQLI_NUM);
     
     $foodname_row=mysqli_fetch_array($foodname_result,MYSQLI_NUM);
     
     $serving_sz_row=mysqli_fetch_array($serving_sz_result,MYSQLI_NUM);
     
     $serving_std_row=mysqli_fetch_array($serving_std_result,MYSQLI_NUM);
     
     
     
     $actual_ct_data= $actual_ct_row[0]; 
     
     $serving_sz_data= $serving_sz_row[0];
     
     $serving_std_data= $serving_std_row[0];
     
     $foodname_data=$foodname_row[0];
     
    
     $_SESSION['foodname']= $foodname_data;
     

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $_SESSION['oauth_token']=$_GET['oauth_token'];
     
    $_SESSION['oauth_verifier']=$_GET['oauth_verifier'];
    
      
  
?>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Poll</h1><div id='home-div-in' class='block'><span class='block-span'>Home</span></div><div id='mypolls' class='block'><span id='mypolls-span' class='block-span'><center>My Polls</center></span><</div><div id='newpoll' class='block'><span id='newpoll-span' class='block-span'>New Poll</span></div></div>  
     <div id='voting-poll-div'> <div id="foodname-div"><span id="foodname-span"></span><span id="serving-std-span"></span><span id="serving_sz">Serving Size</span><span id="actual_serving_ct">(Servings Count)</span><span id="idliketovote">I'd Like to Vote For(Daily Serving Size):</span> <div id="tweet-but-container"><a href="https://twitter.com/share/tweet?text=Ode's%20Food%20Poll%20@" data-size="large" class="twitter-share-button" data-show-count="false">Share on Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></div>
     <form action="UpdateVote.php" id="voteform" method="post">
           
           <select id="voteselect" name="votevalue">
              <option id="firstvoteop" value="0">first</option>
              <option id="secondvoteop" value="1">second</option>
              <option id="thirdvoteop" value="2">third</option>
              <option id="fourthvoteop" value="3">fourth</option>
           </select>
         
         <input id="userpoll-ckbox" type="checkbox" name="userpoll-chk" value="unchecked"><h1 id="userpoll-ckbox-text">Saved To Your Polls</h1> 
        
          <input id="votesubmit-in" type="submit" value="Submit">
          
           
         
        </form>
        
</div><div id="chart"><span id="totalvotes"></span></div></div>

<div id="usermade-votes-div"><span id="usermade-votes-div-title"></span>
<?php
    $serving_sz_data_len=strlen($serving_sz_data);
    $temp_serving_sz_data=substr($serving_sz_data,1,$serving_sz_data_len-2);
    $serving_sz_arr = explode(",", $temp_serving_sz_data);
    
    
    $uservotes_sql = "SELECT * FROM user_votes WHERE food_list_id=".$click_id." AND username= '".$_SESSION['username']."'";
     
     $uservotes_result=mysqli_query($conn, $uservotes_sql);
     
     $votes_count=0;
     
     
     
     if ($uservotes_result->num_rows > 0) {
                // output data of each row
            while($row = $uservotes_result->fetch_assoc()) {
                
                $votes_count+=1;
                 echo "<div class='vote-div'><span class='vote-option-span'>".$serving_sz_arr[$row['vote']-1]." serving</span><br/><span class='vote-timestamp-span'><span style='color:green;'>Voted On : </span>". $row["vote_timestamp"]." (".date_default_timezone_get().")</span></div>";   
               
            }
      } 
      else {
            echo "0 votes";
      }
 
 
      $conn->close();
      
      $usermade_votes_div_height=$votes_count*80+220;
      $ode_h5_div_top= $usermade_votes_div_height+1740;
      $html_height=$ode_h5_div_top+140;

?>
</div>

<div id="ode-h5-div"><h5>This "Ode Food Poll" app is built by <a href="https://github.com/odekyc">@Ode</a> of freecodecamp<br><br> following the instructions of <a href="https://www.freecodecamp.com/challenges/build-a-voting-app">"Basejump: Build a Voting App | Free Code Camp"</a><br><br>Github repository: <a href="https://github.com/odekyc">https://github.com/odekyc</a><br><br>Code Pen: <a href="http://codepen.io/odekyc/">http://codepen.io/odekyc/</a></h5>
</div>
<script type='text/javascript'>

      
        var food_id="<?php echo $click_id?>";
        
        var username="<?php echo $_SESSION['username']?>";
        
         $('#upper-div-title').text(username+" Saved Poll");
        
        $("#usermade-votes-div-title").text(username+"'s Votes:");
        
        $("#usermade-votes-div").css("height","<?php echo $usermade_votes_div_height?>"+"px");
       
       
       $("#mypolls").click(function(){
        window.location.href = "MyPolls.php?oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";

        $('#home-div-in').css("background-color", "#e5ffcc");
        $('#home-div-out').css("background-color", "#e5ffcc");
        $('#mypolls').css("background-color", "#ace600");
    });

    $("#newpoll").click(function(){ 
        window.location.href = "NewPoll.php?oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";

        $('#home-div-in').css("background-color", "#e5ffcc");
        $('#home-div-out').css("background-color", "#e5ffcc");
         $('#newpoll').css("background-color", "#ace600");
        });
        
        $("#home-div-in").click(function(){ 
        window.location.href = "LoggedIn.php?oauth_token="+"<?php echo $_SESSION["oauth_token"] ?>"+"&oauth_verifier="+"<?php echo $_SESSION["oauth_verifier"] ?>";

        $('#home-div-in').css("background-color", "#ace600");
         $('#newpoll').css("background-color", "orange");
    });
    
    // $("#voting-poll-div").css({"position" : "relative",
    //     "margin" : "auto",
    //     "margin-top" : "30px"
    //     // "margin-left" : "-55px"
    // });
    
    
    $("#twitterbtnsignout").click(function(){ 
        window.location.href = "VotingPollOut.php?click_id="+food_id;
        });
    
   
    
      $('#ode-h5-div').css('top',"<?php echo $ode_h5_div_top?>"+"px");
       $('html').css('height', "<?php echo $html_height?>"+"px");
       
       $('#voting-poll-div').css('height', '1400px');
       
       

      
       
        var width=700,
           height=700,
           radius=350,
           colors= d3.scale.category10();
           
       var serving_counts="<?php echo $actual_ct_data?>";
       
       var serving_sz="<?php echo $serving_sz_data?>";
       
       var serving_std="<?php echo $serving_std_data?>"
       
       var foodname= "<?php echo $foodname_data?>";
       
       var db_usersaved="<?php echo $usersaved_data?>";
       
     
       
       var foodnameLen= foodname.length;

       var foodname_arr=foodname.split(' ');
       
 
       var revised_foodname="";
       
       var revised_foodname_arr=[];
       
       var foodname_lines=0;
       
       var foodnm_chk_hlder="";
       
       var temp_foodname_chk="";
       
       for(var i = 0; i < foodname_arr.length; i++) { 
            
            foodnm_chk_hlder=foodname_arr[i];
             
            while (foodnm_chk_hlder.length > 12 ){
                temp_foodname_chk+=foodnm_chk_hlder.slice(0,12)+"-<br />";
                foodnm_chk_hlder=foodnm_chk_hlder.slice(12);
                
            }
            
            temp_foodname_chk+=foodnm_chk_hlder;
            
            revised_foodname_arr.push(temp_foodname_chk);
            temp_foodname_chk="";
        }
       
        // $( "#firstvoteop" ).val("0-"+food_id);
        // $( "#secondvoteop" ).val("1-"+food_id);
        // $( "#thirdvoteop" ).val("2-"+food_id);
        // $( "#fourthvoteop" ).val("3-"+food_id);

       revised_foodname=revised_foodname_arr.join(" ");
       
       foodname_lines+=Math.ceil(foodnameLen/12);
       
       if(revised_foodname.indexOf("<br />")>0){
           foodname_lines+=1;
       }
       
        var serving_std_top=(foodname_lines*85)+100;
        
        var serving_sz_top=(foodname_lines*85)+185;
        
        var actual_servingct_top=(foodname_lines*85)+235;
        
         var idliketovote_top=(foodname_lines*85)+335;
         
         var voteform_top=(foodname_lines*85)+375;
         
         var tweetbut_top=(foodname_lines*85)+500;
         

        
    
        $("#foodname-span").html(revised_foodname);
        
        // $("#votesubmit").click(function(){
        //      var voteselect_val=$( "#voteselect" ).val();
             
            
              
        //       alert(voteselect_val);
             
        
        //      if(voteselect_val== 0){
        //          serving_counts_arr[0]=Number(serving_counts_arr[0])+1;
        //      }
        //      else if(voteselect_val== 1){
        //          serving_counts_arr[1]=Number(serving_counts_arr[1])+1;
        //      }
        //      else if(voteselect_val== 2){
        //          serving_counts_arr[2]=Number(serving_counts_arr[2])+1;
        //      }
        //      else if(voteselect_val== 3){
        //          serving_counts_arr[3]=Number(serving_counts_arr[3])+1;
        //      }
             
        //     var updated_serving_counts="("+String(serving_counts_arr[0])+","+String(serving_counts_arr[1])+","+String(serving_counts_arr[2])+","+String(serving_counts_arr[3])+")";
     
        //     window.location.href = "UpdateVote.php?click_id="+food_id;
             
            
      
        // });
        
        
         
        $("#serving_sz").css("top", serving_sz_top+"px");
        
         $("#actual_serving_ct").css("top", actual_servingct_top+"px");
         
          $("#idliketovote").css("top", idliketovote_top+"px");
 
        $("#foodname-span").css("top", "75px");         
 
        $("#serving-std-span").text(serving_std+"(s)");
        
        $("#serving-std-span").css("top",serving_std_top+"px");
        
        $("#serving-std-span").css("left","0px");
        
        $("#foodname-div").css("height","1100px");
        
        $("#foodname-div").css("background-color","#ffff99");
        
        $("#chart").css("top","170px");
        
        $("#voteform").css("top",voteform_top+"px");
        
         $("#tweet-but-container").css("top",tweetbut_top+"px");
           
       var serving_counts=serving_counts.slice(1,serving_counts.length-1);
       
        var serving_sz=serving_sz.slice(1,serving_sz.length-1);
       
       var serving_counts_arr=serving_counts.split(",");
       
       var serving_sz_arr=serving_sz.split(",");
       
       $("#firstvoteop").text(serving_sz_arr[0]);
       
       $("#secondvoteop").text(serving_sz_arr[1]);
       
       $("#thirdvoteop").text(serving_sz_arr[2]);
       
       $("#fourthvoteop").text(serving_sz_arr[3]);
       
       var totalVotesCnt=Number(serving_counts_arr[0])+Number(serving_counts_arr[1])+Number(serving_counts_arr[2])+Number(serving_counts_arr[3]);
       
     $("#totalvotes").text(totalVotesCnt+" Votes");
           
       var piedata= [
              { 
                  label: serving_sz_arr[0],
                  value : serving_counts_arr[0]
              },
              { 
                  label: serving_sz_arr[1],
                  value : serving_counts_arr[1]
              },
            { 
                  label: serving_sz_arr[2],
                  value : serving_counts_arr[2]
              },
              { 
                  label: serving_sz_arr[3],
                  value : serving_counts_arr[3]
              }
           ];
           
        function checkZeroCount(data) {
            return data.value > 0;
        }
        
        piedata=piedata.filter(checkZeroCount);
           
//         var pie = d3.layout.pie()
//                   .value(function(d){
//                       return d.value;
//                   });
                  
//         var arc= d3.svg.arc()
//                 .outerRadius(radius);
                
//         var myChart = d3.select('#chart').append('svg')
//           .attr('width', width)
//           .attr('height', height)
//           .append('g')
//           .attr('transform', 'translate('+(width - radius )+ ',' + (height-radius) +')')
//           .selectAll('path').data(pie(piedata))
//           .enter().append('g')
//           .attr('class','slice');
           
//   var slices=d3.selectAll('g.slice')
//             .append('path')
//             .attr('z-index','-1')
//           .attr('fill', function(d,i){
//               return colors(i);
//           })
//           .attr( 'd', arc);
  
                       
//  var serving_sz_text = d3.selectAll('g.slice')
//               .append('text')
//               .text(function(d,i){
//                   return d.data.label+" ("+d.data.value+")";
//               })
//               .attr('class','sztext')
//               .attr('text-anchor','middle')
//               .attr('z-index','12')
//               .attr('fill', 'white' )
//               .attr('font-size', '1.8em')
//               .attr('font-weight','bolder')
//               .attr('transform', function(d){
//                   d.innerRadius=0;
//                   d.outerRadius=radius;
//                   return 'translate('+arc.centroid(d)+')';
//               });
              
              
        // Define arc ranges
    var arcText = d3.scale.ordinal()
      .rangeRoundBands([0, width], .1, .3);

    // Determine size of arcs
    var arc = d3.svg.arc()
      .innerRadius(radius - 175)
      .outerRadius(radius - 10);

    // Create the donut pie chart layout
    var pie = d3.layout.pie()
      .value(function(d) {
        return d.value;
      })
      .sort(null);
      
      
     // Append SVG attributes and append g to the SVG
    var mySvg = d3.select('#chart').append("svg")
      .attr("width", width)
      .attr("height", height);

    var svg = mySvg
      .append("g")
      .attr("transform", "translate(" + radius + "," + radius + ")");

    var svgText = mySvg
      .append("g")
      .attr("transform", "translate(" + radius + "," + radius + ")");

    // Define inner circle
    svg.append("circle")
      .attr("cx", 0)
      .attr("cy", 0)
      .attr("r", radius)
      .attr("fill", "#b3d7ff")
      .attr("id", "skycircle");

    // Calculate SVG paths and fill in the colours
    var slices = svg.selectAll(".arc")
      .data(pie(piedata))
      .enter().append("g")
      .attr("class", "arc");

    // Append the path to each g
    slices.append("path")
      .attr("d", arc)
      //.attr("data-legend", function(d, i){ return parseInt(newData[i].count) + ' ' + newData[i].emote; })
      .attr("fill", function(d, i) {
        return colors(i);
      });


      
      function tweenPie(finish) {
            var start = {
                startAngle: 0,
                endAngle: 0
            };
            var interpolator = d3.interpolate(start, finish);
            return function(d) { return arc(interpolator(d)); };
        }
     
     

     
      slices.append('path')
            .attr({
                'fill': function (d, i) {
                    return colors(i);
                }
            })
            .transition()
            .duration(1000)
            .attrTween('d', tweenPie);


    var labeltxt = svg.selectAll(".labeltxt")
      .data(pie(piedata))
      .enter().append("g")
      .attr("class", "labeltxt");
    // Append text labels to each arc
    labeltxt.append("text")
      .attr("transform", function(d) {
        return "translate(" + arc.centroid(d) + ")";
      })
      .attr("dy", 0)
      .style("text-anchor", "middle")
      .attr('font-size', '1.8em')
      .attr('font-weight','bolder')
      .attr("fill", "#fff")
      .text(function(d) {
        return d.data.label;
      });
      
    var valuetxt = svg.selectAll(".valuetxt")
      .data(pie(piedata))
      .enter().append("g")
      .attr("class", "valuetxt");
      
    valuetxt.append("text")
      .attr("transform", function(d) {
        return "translate(" + arc.centroid(d) + ")";
      })
      .attr("dy", "1.2em")
      .style("text-anchor", "middle")
      .attr('font-size', '1.8em')
      .attr('font-weight','bolder')
      .attr("fill", "#fff")
      .text(function(d) {
        return "("+d.data.value+")";
      });
      
      
      if(db_usersaved !="unchecked"){
          document.getElementById("userpoll-ckbox").checked=true;
          var tempval=$( "#userpoll-ckbox" ).val("checked");
         
      }
     
     
     var usersaved=false;
     
     
      
      $("#userpoll-ckbox").click(function(){
           usersaved = document.getElementById("userpoll-ckbox").checked;
          if(usersaved ==true){
              $( "#userpoll-ckbox" ).val("checked");
          }
          else if(usersaved == false){
              $( "#userpoll-ckbox" ).val("unchecked");
          }
          var value= $( "#userpoll-ckbox" ).val();
        
      });
      
    
   </script>
   
<?php
   if($_SESSION['dbupdated']=="success"){
       $_SESSION['dbupdated']="none";
        echo "<div id='dbupdate-status-div'><h1 id='dbupdate-status-h1'><CENTER>This Vote Has Been Updated in Database Successfully</CENTER></h1></div>";
   }
   elseif($_SESSION['dbupdated']=="fail"){
        $_SESSION['dbupdated']="none";
        echo "<div id='dbupdate-status-div'><h1 id='dbupdate-status-h1'><CENTER>Database Connection Error".$_SESSION['dbupdate-error']."</CENTER></h1></div>";
   }

?>
