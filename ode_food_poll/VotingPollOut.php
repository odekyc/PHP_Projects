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
     $Twitter = new EpiTwitter($consumerKey2, $consumerSecret2);

     
     
      
     echo "<link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />"; 
  
     echo '<a id="twitterbtnsignin" href="' . $Twitter->getAuthenticateUrl() . '">
     <img src="twitterlogin.png" alt="sign in with twitter" />
     </a>';
     

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
    
     $actual_ct_sql = "SELECT actual_serving_count FROM food_list WHERE id=".$click_id;
     
     $serving_sz_sql = "SELECT serving_sizes FROM food_list WHERE id=".$click_id;
 
      $foodname_sql = "SELECT foodname FROM food_list WHERE id=".$click_id;
      
      $serving_std_sql = "SELECT serving_standard FROM food_list WHERE id=".$click_id;
       
      $actual_ct_result=mysqli_query($conn, $actual_ct_sql);
      
      $foodname_result=mysqli_query($conn, $foodname_sql);
      
     $serving_sz_result=mysqli_query($conn, $serving_sz_sql);
     
      $serving_std_result=mysqli_query($conn, $serving_std_sql);
      
     $actual_ct_row=mysqli_fetch_array($actual_ct_result,MYSQLI_NUM);
     
     $foodname_row=mysqli_fetch_array($foodname_result,MYSQLI_NUM);
     
     $serving_sz_row=mysqli_fetch_array($serving_sz_result,MYSQLI_NUM);
     
     $serving_std_row=mysqli_fetch_array($serving_std_result,MYSQLI_NUM);
     
     $actual_ct_data= $actual_ct_row[0]; 
     
     $serving_sz_data= $serving_sz_row[0];
     
     $serving_std_data= $serving_std_row[0];
     
     $foodname_data=$foodname_row[0];
     


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
  
      $conn->close();
    
  
    
?>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Poll</h1><div id='home-div-out' class='block'><span class='block-span'>Home</span></div></div> 
       <div id='voting-poll-div'><div id="foodname-div"><span id="foodname-span"></span><span id="serving-std-span"></span><span id="serving_sz">Daily Serving Sizes</span><span id="actual_serving_ct">(Actual Daily Servings Vote Counts)</span></div><div id="chart"></div></div>

<h5 id="underscript-newpoll">This "Ode Food Poll" app is built by <a href="https://github.com/odekyc">@Ode</a> of freecodecamp<br><br> following the instructions of <a href="https://www.freecodecamp.com/challenges/build-a-voting-app">"Basejump: Build a Voting App | Free Code Camp"</a><br><br>Github repository: <a href="https://github.com/odekyc">https://github.com/odekyc</a><br><br>Code Pen: <a href="http://codepen.io/odekyc/">http://codepen.io/odekyc/</a></h5>
 
   <script type="text/javascript">
   
        $("#twitterbtnsignin").click(function(){ 
        window.location.href = "VotingPollIn.php";
        });
    
       $("#mypolls").click(function(){
        window.location.href = "MyPolls.php";
        $('#home-div-in').css("background-color", "#99ceff");
        $('#mypolls').css("background-color", "#ace600");
    });

  $("#home-div-out").hover(function(){ 
     
        $('#home-div-out').css("background-color", "#ace600");
        
    }, function(){ 
     
        $('#home-div-out').css("background-color", "#99ceff");
        
    });
    $("#newpoll").click(function(){ 
        window.location.href = "NewPoll.php";
        $('#home-div-in').css("background-color", "#99ceff");
         $('#newpoll').css("background-color", "#ace600");
        });
    
       $('h5').css('top','1200px');
        $('#voting-poll-div').css('width', '1300px');
        
      $("#home-div-out").click(function(){ 
        window.location.href = "NotLoggedIn.php";
        $('#home-div-out').css("background-color", "#ace600");
        
    });
    
       var foodname= "<?php echo $foodname_data?>";
    
    $("#foodname-span").text(foodname);
    
     $('h5').css('top','1300px');
       $('html').css('height', '1500px');
       
       $('#voting-poll-div').css('height', '1100px');
       
        $('#voting-poll-div').css('width', '1300px');
       
       $('#voting-poll-div').css('left', '56px');
       
        var width=700,
           height=700,
           radius=350,
           colors= d3.scale.category10();
           
       var serving_counts="<?php echo $actual_ct_data?>";
       
       var serving_sz="<?php echo $serving_sz_data?>";
       
       var serving_std="<?php echo $serving_std_data?>"
       
       var foodname= "<?php echo $foodname_data?>";
       
       var foodnameLen= foodname.length;
       
       
       
      
       
       var foodname_arr=foodname.split(' ');
       
 
       var revised_foodname="";
       
       var revised_foodname_arr=[];
       
       var foodname_lines=0;
       
       var foodnm_chk_hlder="";
       
       var temp_foodname_chk="";
       
       for(var i = 0; i < foodname_arr.length; i++) { 
            
            foodnm_chk_hlder=foodname_arr[i];
             
            while (foodnm_chk_hlder.length > 13 ){
                temp_foodname_chk=foodnm_chk_hlder.slice(0,13)+"-<br />";
                foodnm_chk_hlder=foodnm_chk_hlder.slice(13);
                
            }
            
            temp_foodname_chk+=foodnm_chk_hlder;
            
            revised_foodname_arr.push(temp_foodname_chk);
            temp_foodname_chk="";
        }
       


       revised_foodname=revised_foodname_arr.join(" ");
       
       foodname_lines+=Math.ceil(foodnameLen/13);
       
       if(revised_foodname.indexOf("<br />")>0){
           foodname_lines+=1;
       }
       
        var serving_std_height=(foodname_lines*85)+40;
        
        var serving_sz_height=(foodname_lines*85)+125;
        
        var actual_servingct_height=(foodname_lines*85)+175;
    
        $("#foodname-span").html(revised_foodname);
        
        $("#serving_sz").css("top", serving_sz_height);
        
         $("#actual_serving_ct").css("top", actual_servingct_height);
        
        $("#serving-std-span").text(serving_std+"(s)");
        
        $("#serving-std-span").css("top",serving_std_height+"px");
        
        $("#serving-std-span").css("left","0px");
        
        $("#foodname-div").css("height","1000px");
        
        $("#foodname-div").css("background-color","#ffff99");
        
        $("#chart").css("top","130px");
           
       var serving_counts=serving_counts.slice(1,serving_counts.length-1);
       
        var serving_sz=serving_sz.slice(1,serving_sz.length-1);
       
       var serving_counts_arr=serving_counts.split(",");
       
       var serving_sz_arr=serving_sz.split(",");
       
           
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
      .innerRadius(radius - 230)
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
      .attr("fill", "#fff");

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
      
     </script>

