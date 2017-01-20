 <script type="text/javascript">
    
   
       
       // window.location.href = "VotingPollIn.php";
       
 
 </script>
 
 <?php
      session_start();
      $servername = getenv('IP');
      $username = getenv('C9_USER');
      $password = "";
      $database = "ode_food_poll";
      $dbport = 3306;
      
      
    $conn = new mysqli($servername, $username, $password, $database, $dbport);
    
    
      echo $_SESSION['click_id'];
      echo "<br />";
      echo $_POST["votevalue"];
      
      $click_id=$_SESSION['click_id'];
      
      $actual_ct_sql = "SELECT actual_serving_count FROM food_list WHERE id=".$click_id;
      
      $actual_ct_result=mysqli_query($conn, $actual_ct_sql);
      
      $actual_ct_row=mysqli_fetch_array($actual_ct_result,MYSQLI_NUM);
      
      $actual_ct_data= $actual_ct_row[0];
      
      echo $actual_ct_data;
      
      
        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
  
      $conn->close();
 
 ?>