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
    
    
      
      $votevalue=$_POST["votevalue"];
      
      $click_id=$_SESSION['click_id'];
      
      $actual_ct_sql = "SELECT actual_serving_count FROM food_list WHERE id=".$click_id;
      
      $actual_ct_result=mysqli_query($conn, $actual_ct_sql);
      
      $actual_ct_row=mysqli_fetch_array($actual_ct_result,MYSQLI_NUM);
      
      $actual_ct_data= $actual_ct_row[0];
     
      $data_trimmed=substr($actual_ct_data,1, strlen($actual_ct_data)-2);
      
      echo $data_trimmed;
      
      $data_arr=split('[,]', $data_trimmed);
      
      echo $data_arr[0];
      
      echo $data_arr[1];
      
      echo $data_arr[2];
      
      echo $data_arr[3];
      
      
      if($votevalue==0){
        $data_arr[0]=$data_arr[0]+1;
        $data_arr[1]=$data_arr[1];
        $data_arr[2]=$data_arr[2];
        $data_arr[3]=$data_arr[3];
      }
      elseif($votevalue==1){
        $data_arr[1]=$data_arr[1]+1;
        $data_arr[0]=$data_arr[0];
        $data_arr[2]=$data_arr[2];
        $data_arr[3]=$data_arr[3];
       
      }
       elseif($votevalue==2){
        $data_arr[2]= $data_arr[2]+1;
        $data_arr[1]=$data_arr[1];
        $data_arr[0]=$data_arr[0];
        $data_arr[3]=$data_arr[3];
        
      }
       elseif($votevalue==3){
        $data_arr[3]=$data_arr[3]+1;
        $data_arr[1]=$data_arr[1];
        $data_arr[2]=$data_arr[2];
        $data_arr[0]=$data_arr[0];
        
      }
      
      $update_actual_cnt="(".$data_arr[0].",".$data_arr[1].",".$data_arr[2].",".$data_arr[3].")";
      
      echo $update_actual_cnt;
      
      $update_sql="UPDATE food_list SET actual_serving_count='".$update_actual_cnt."' WHERE id=".$click_id;
      
      echo $update_sql;
      
      $update_result=mysqli_query($conn, $update_sql);
      
      if ($conn->query($update_sql) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $conn->error;
      }
      
        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
  
      $conn->close();
      
      
      if($_SESSION["which_page"]=="In"){
         header("Location: VotingPollIn.php?click_id=".$click_id);
      }
      elseif($_SESSION["which_page"]=="Out"){
        
         header("Location: VotingPollOut.php?click_id=".$click_id);
      }
 
 ?>