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
     

      $foodname=ucwords(strtolower($_POST["foodname"]));
      
      $serving_stnd=strtolower($_POST["serving-stnd"]);
      
      $srvingstnd_len=strlen($serving_stnd);
      
      $srvingstnd_lastch=substr($serving_stnd,-1,1);
      
      $srvingstnd_2ndlastch=substr($serving_stnd,-2,1);
      
      $srvingstnd_3rdlastch=substr($serving_stnd,-3,1);
      
      if(($srvingstnd_lastch=="s")&&($srvingstnd_2ndlastch=="e")){
          if(($srvingstnd_3rdlastch=="c")||($srvingstnd_3rdlastch=="z")||($srvingstnd_3rdlastch=="x")){
              $serving_stnd=substr($serving_stnd,0,$srvingstnd_len-1);
          }
          else if($srvingstnd_3rdlastch=="s"){
              $serving_stnd=substr($serving_stnd,0,$srvingstnd_len-2);
          }
          else{
              $serving_stnd=substr($serving_stnd,0,$srvingstnd_len-1);
          }
      }
      else if(($srvingstnd_lastch=="s")&&($srvingstnd_2ndlastch!="e")){
         if($srvingstnd_2ndlastch!="s"){
              $serving_stnd=substr($serving_stnd,0,$srvingstnd_len-1);
         }
      }
      
      
      
      

?>

<link rel='stylesheet' type='text/css' href='stylesheet.css?<?php echo time(); ?>' />

<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Polls</h1><div id='home-div-in' class='block'><span class='block-span'>Home</span></div><div id='mypolls' class='block'><span id='mypolls-span' class='block-span'><center>My Polls</center></span><</div><div id='newpoll' class='block'><span id='newpoll-span' class='block-span'>New Poll</span><</div></div>
<div id='newpoll-main-div' style="background-color: #f4f4d7;"><div id='newpoll-main-inner-div' style="background-color: #b0cbe8;"><span id='newpoll-main-title-span' style="color: #b3804d;">Make a New Poll:</span>
<div>
<br>
<br>
<br>
<div id="form-div">
    <div id="inner-form-div" >
        <form id="inner-form" action="NewPoll.php" method="post">
           <CENTER> <h1 id="firstvote-h1" style="color: #ff661a;" >Place Your First Vote:</h1> </CENTER>
           <CENTER><h3 style="color: blue; position: relative; left: 30px; top: -95px;">Your Vote Is Precious, Tell Us, How Many Servings Do You Consume Daily On Average?</h3></CENTER>
           <h1 id="username">Username</h1>
        
        <img id="newpoll-submit-img" src="https://www.webceo.com/blog/wp-content/uploads/2015/11/twitter.jpg" alt="Twitter Pic" height="140" width="120" style="border: 15px solid blue;">
             <div id="inner-form-content">
          <div id="inner-form-foodname-div">
           <h1 id="newpoll-submit-foodname">Rose Tea</h1>
           
           <h2 id="newpoll-serving-stnd">serving standard(s)</h2>
            <select id="newpoll-servings" name="servings">
                <option id="op1" value="1">1</option>
                <option id="op2" value="2">2</option>
                <option id="op3" value="3">3</option>
                <option id="op4" value="4">4</option>
            </select>
            
             <input id="newpollsubmit-submit" type="submit" value="Submit" >
            </div>
            </div>
        </form>
       
    
    </div>
<form action="NewPoll.php" method="post" >
    <fieldset disabled>
    <input id="submit" type="submit" value="Submit" style="background-color: #5353ac;">
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
   
   
  <h1 id="form-title" style="color: #396046">Foodname&nbsp(Max&nbsp56&nbspChars):</h1>
  

  <input id="foodname-form" name="foodname" type="text" maxlength="56" style="background-color: #999999;" required>
 <br>
 <div id="serving-stnd">
  <h1 id="serving-stnd-title" style="color: #396046">Serving Standard:</h1>
  <h1><input id="serving-stnd-input" name="serving-stnd" type="text" maxlength="30" style="background-color: #999999;" required>(s)</h1>
 </div> 
  
  <div id="radio-div">
      <br>
      <input id="radiopreset" type="radio" name="radioservings" value="preset" checked><span class="radio-title"> (0,1,2,more than 3)</span> 
      <br>
      <br>
      <br>
      <input id="radiocustom" type="radio" name="radioservings" value="custom"><span class="radio-title"> Custom(please enter below):</span>
      <br>
      <br>
    <h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ( Less than <input id="customval1" class="customval" name="customvalue1" type="number" min="1" max="100" readonly required> , <input id="customval2" class="customval" name="customvalue2" type="number" min="1" max="900" readonly required> - <input id="customval3" class="customval" name="customvalue3" type="number" min="1" max="900" readonly required> , <input id="customval4" class="customval" name="customvalue4" type="number" min="1" max="900" readonly required> - <input id="customval5" class="customval" name="customvalue5" type="number" min="1" max="900" readonly required> , More than <input id="customval6" class="customval" name="customvalue6" type="number" min="1" max="900" readonly required> ) </h3>
  
  </div>
  </fieldset>
</form>


</div>
</div>
</div>
</div>
<div id="#ode-h5-div"><h5>This "Ode Food Poll" app is built by <a href="https://github.com/odekyc">@Ode</a> of freecodecamp<br><br> following the instructions of <a href="https://www.freecodecamp.com/challenges/build-a-voting-app">"Basejump: Build a Voting App | Free Code Camp"</a><br><br>Github repository: <a href="https://github.com/odekyc">https://github.com/odekyc</a><br><br>Code Pen: <a href="http://codepen.io/odekyc/">http://codepen.io/odekyc/</a></h5>
 </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
       $("form").submit(function(){
            // $("#upper-div").css("width", "1300px");
            // $("#newpoll-main-div").css("width", "1300px");
            
            
            
            //   $("#newpoll-main-div").css("height", "1300px");
    
            
            //  $("#ode-h5-div").css("top", "1200px");
             
            //  $("h5").css("margin-top", "190px");
            // $("#newpoll-main-div").css({"position" : "relative",
            //     "margin" : "auto",
            //     "margin-top" : "30px"
            // });
            //   $('html').height("1400px");
            // $('#home-div-in').css("background-color", "#e5ffcc");
            // $('#home-div-in').hover(function(){   $('#home-div-in').css("background-color", "#ace600");} , function(){ $('#home-div-in').css("background-color", "#e5ffcc"); });
            // $('#newpoll').css("background-color", "#ace600");
            

    });
    
   
    
    var foodname="<?php echo $foodname ?>";
    var profilepic_url="<?php echo $_SESSION['profilepic'] ?>";
     var username="<?php echo $_SESSION['username'] ?>";
      var serving_stnd="<?php echo $serving_stnd ?>";
      
      var profilepic_index = profilepic_url.indexOf("_normal.");
      
      var fullsized_profilepic_url=profilepic_url.slice(0, profilepic_index)+profilepic_url.slice(profilepic_index+7);
      
       var foodnameLen= foodname.length;

       var foodname_arr=foodname.split(' ');
       
 
       var revised_foodname="";
       
       var revised_foodname_arr=[];
       
       var foodname_lines=0;
       
       var foodnm_chk_hlder="";
       
       var temp_foodname_chk="";
       
       for(var i = 0; i < foodname_arr.length; i++) { 
            
            foodnm_chk_hlder=foodname_arr[i];
             
            while (foodnm_chk_hlder.length > 18 ){
                temp_foodname_chk+=foodnm_chk_hlder.slice(0,18)+"-<br />";
                foodnm_chk_hlder=foodnm_chk_hlder.slice(18);
                
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
       
       foodname_lines+=Math.ceil(foodnameLen/18);
       
       if(revised_foodname.indexOf("<br />")>0){
           foodname_lines+=1;
       }
       
      $("#newpoll-submit-foodname").html(revised_foodname);
      $('#username').text(username);
         $('#newpoll-serving-stnd').text(serving_stnd+"(s)");
          $('#newpoll-submit-img').attr("src", fullsized_profilepic_url);
     
   
     $("#upper-div").css("width", "1300px");
   
     $("#ode-h5-div").css("top", "1200px");
     
     $("h5").css("margin-top", "190px");
     
   
          $("#newpoll-main-div").css({"position" : "relative",
                "margin" : "0 auto",
                "margin-top" : "30px",
                "margin-left" : "0px"
            });
   
    $('html').height("1400px");
    $('#home-div-in').css("background-color", "#afc3a2");
     $('html').css("background-color", "#afc3a2");
   $('#newpoll').css("background-color", "#9dc059");
    $('#newpoll').css("pointer-events", "none");
    $('#mypolls').css("pointer-events", "none");
     $('#mypolls').css("background-color", "#f4f4d7");
    $('#home-div-in').css("pointer-events", "none");
    $('#twitterbtnsignout').css("pointer-events", "none");
    $("#newpoll-main-div").css("border", "10px solid #396046");
    $("#upper-div").css("border", "10px solid #396046");
    $("#upper-div").css("background-color", "#b5c4e3");

    $("#newpoll-main-inner-div").css("border", "20px solid #396046");

    
</script>






<?php
   $which_radio=$_POST['radioservings'];
   
   if ((isset($_POST["foodname"]))&&(!isset($_POST["servings"]))){
      
      if($which_radio === "custom"){
          $custom_val1=$_POST['customvalue1'];
          $custom_val2=$_POST['customvalue2'];
          $custom_val3=$_POST['customvalue3'];
          $custom_val4=$_POST['customvalue4'];
          $custom_val5=$_POST['customvalue5'];
          $custom_val6=$_POST['customvalue6'];
          
          echo $custom_val2;
          $serving_sizes="(".$custom_val1.",".$custom_val2."-".$custom_val3.",".$custom_val4."-".$custom_val5.",".$custom_val6.")";
      }
      elseif ($which_radio === "preset") {
          $serving_sizes="(0,1,2,more than 3)";
      }
    
        
        

      
      
      // echo $_SESSION['username'];
      // echo $_SESSION["profilepic"];
    //   $_SESSION["serving-stnd"] = $_POST["serving-stnd"];
      $_SESSION["foodname"]=$foodname;
      $_SESSION["serving-stnd"]=$serving_stnd;
      $_SESSION["category"]= $_POST["category"];
      $_SESSION["whichradio"]= $which_radio;
      $_SESSION["customval1"]= $custom_val1;
      $_SESSION["customval2"]= $custom_val2;
      $_SESSION["customval3"]= $custom_val3;
      $_SESSION["customval4"]= $custom_val4;
      $_SESSION["customval5"]= $custom_val5;
      $_SESSION["customval6"]= $custom_val6;
      $_SESSION["serving-sizes"]=$serving_sizes;
      // $_SESSION["just_submitted"] = false;
    
      // echo $_SESSION["profilepic"];
      
   }
?>



<script type="text/javascript">
   var whichradio="<?php echo $which_radio ?>";
   if(whichradio=="preset"){
       $('#op1').text("0");
       $('#op2').text('1');
       $('#op3').text('2');
       $('#op4').text('more than 2');
   }
   else if(whichradio=="custom"){
       var customval1="<?php echo $custom_val1 ?>";
       var customval2="<?php echo $custom_val2 ?>";
       var customval3="<?php echo $custom_val3 ?>";
       var customval4="<?php echo $custom_val4 ?>";
       var customval5="<?php echo $custom_val5 ?>";
       var customval6="<?php echo $custom_val6 ?>";
       

       $('#op1').text("less than "+String(customval1));
       $('#op2').text(String(customval2)+"-"+String(customval3));
       $('#op3').text(String(customval4)+"-"+String(customval5));
       $('#op4').text("more than "+String(customval6));
   }
</script>