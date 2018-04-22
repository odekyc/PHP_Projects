 <script type="text/javascript">
    
   
       
    //   var saved_or_not="<?php echo $_POST['userpoll-chk']?>";
       
    //   alert(saved_or_not);
       
 
 </script>
 
 <?php
      session_start();
      include 'database.php';


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
    
    
      
      $votevalue=$_POST["votevalue"];
      
      $click_id=$_SESSION['click_id'];
      
      $user_saved=$_POST["userpoll-chk"];
      
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
      
      
      
      if ($update_result === TRUE) {
          $_SESSION['dbupdated']="success";
      } else {
          $_SESSION['dbupdated']="fail";
          $_SESSION['dbupdate-error']= $conn->error;
      }
      
        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    if($user_saved== "checked"){
      
          $get_creator_foodlist_sql="SELECT creator_username FROM food_list WHERE id=".$click_id;
          
          $get_creator_foodlist_result=mysqli_query($conn, $get_creator_foodlist_sql);
          
          $get_creator_foodlist_row=mysqli_fetch_array($get_creator_foodlist_result,MYSQLI_NUM);
          
          $creator_username=$get_creator_foodlist_row[0];
          
          $get_foodname_foodlist_sql="SELECT foodname FROM food_list WHERE id=".$click_id;
          
          $get_foodname_foodlist_result=mysqli_query($conn, $get_foodname_foodlist_sql);
          
          $get_foodname_foodlist_row=mysqli_fetch_array($get_foodname_foodlist_result,MYSQLI_NUM);
          
          $foodname=$get_foodname_foodlist_row[0];
          
          $get_category_foodlist_sql="SELECT category FROM food_list WHERE id=".$click_id;
          
          $get_category_foodlist_result=mysqli_query($conn, $get_category_foodlist_sql);
          
          $get_category_foodlist_row=mysqli_fetch_array($get_category_foodlist_result,MYSQLI_NUM);
          
          $category=$get_category_foodlist_row[0];
        
          $insert_usersaved_sql="INSERT INTO user_saved ( creator_username , foodname, saver_username, food_list_id, category) VALUES ('".$creator_username."','".$foodname."','".$_SESSION['username']."','".$click_id."','".$category."')";
          
          $insert_usersaved_result=mysqli_query($conn, $insert_usersaved_sql);
          
          if ($insert_usersaved_result === TRUE) {
              if($_SESSION['dbupdated']="success"){
                $_SESSION['dbupdated']="success";
              }
              elseif($_SESSION['dbupdated']="fail"){
                  $_SESSION['dbupdated']="fail";
              }
          } else {
              $_SESSION['dbupdated']="fail";
              $_SESSION['dbupdate-error']= $conn->error;
          }
          
          $votevalue=$votevalue+1;
            
         $insert_uservotes_sql="INSERT INTO user_votes (foodname, vote, username, food_list_id) VALUES ('".$_SESSION["foodname"]."','".$votevalue."','".$_SESSION["username"]."','".$click_id."')";
         $insert_uservotes_result=mysqli_query($conn, $insert_uservotes_sql);
         
             if ( $insert_uservotes_result=== TRUE) {
              if($_SESSION['dbupdated']="success"){
                $_SESSION['dbupdated']="success";
              }
              elseif($_SESSION['dbupdated']="fail"){
                  $_SESSION['dbupdated']="fail";
              }
          } else {
              $_SESSION['dbupdated']="fail";
              $_SESSION['dbupdate-error']= $conn->error;
          }
    }
    elseif($user_saved== ""){
       $delete_usersaved_sql="DELETE FROM user_saved WHERE saver_username= '".$_SESSION["username"]."' AND food_list_id = ".$click_id;
          
          $delete_usersaved_result=mysqli_query($conn, $delete_usersaved_sql);
          
             if ($delete_usersaved_result === TRUE) {
              if($_SESSION['dbupdated']="success"){
                $_SESSION['dbupdated']="success";
              }
              elseif($_SESSION['dbupdated']="fail"){
                  $_SESSION['dbupdated']="fail";
              }
          } else {
              $_SESSION['dbupdated']="fail";
              $_SESSION['dbupdate-error']= $conn->error;
          }
          
        $delete_uservotes_sql="DELETE FROM user_votes WHERE username= '".$_SESSION["username"]."' AND food_list_id=".$click_id;
        $delete_uservotes_result = mysqli_query($conn, $delete_uservotes_sql);
        if ($delete_uservotes_result === TRUE) {
              if($_SESSION['dbupdated']="success"){
                $_SESSION['dbupdated']="success";
              }
              elseif($_SESSION['dbupdated']="fail"){
                  $_SESSION['dbupdated']="fail";
              }
          } else {
              $_SESSION['dbupdated']="fail";
              $_SESSION['dbupdate-error']= $conn->error;
          }
    }
    
        
  
      $conn->close();
      
    if($_SESSION['whichupdatevote']=="regular"){  
          if($_SESSION["which_page"]=="In"){
             header("Location: VotingPollIn.php?click_id=".$click_id."&oauth_token=".$_SESSION['oauth_token']."&oauth_verifier=".$_SESSION['oauth_verifier']);
          }
          elseif($_SESSION["which_page"]=="Out"){
            
             header("Location: VotingPollOut.php?click_id=".$click_id);
          }
    }
    elseif($_SESSION['whichupdatevote']=="saved"){
            header("Location: MyPollVotingPollSaved.php?click_id=".$click_id."&oauth_token=".$_SESSION['oauth_token']."&oauth_verifier=".$_SESSION['oauth_verifier']);

    }
    elseif($_SESSION['whichupdatevote']=="usermade"){
           header("Location: MyPollVotingPollUsermade.php?click_id=".$click_id."&oauth_token=".$_SESSION['oauth_token']."&oauth_verifier=".$_SESSION['oauth_verifier']);

    }
 ?>
 
 <?php echo $_POST['userpoll-chk']?>