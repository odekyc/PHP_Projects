<?php

    include 'database.php';
    session_start();
    
    
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
     
     echo $click_id;
     
     $conn = new mysqli($servername, $username, $password, $database, $dbport);
    
     
      
    $delete_poll_userpolls_sql="DELETE FROM user_polls WHERE food_list_id = ".$click_id;
    $delete_poll_userpolls_result=mysqli_query($conn, $delete_poll_userpolls_sql);
    
    $delete_poll_uservotes_sql="DELETE FROM user_votes WHERE food_list_id =".$click_id;
    $delete_poll_uservotes_result=mysqli_query($conn, $delete_poll_uservotes_sql);
    
    $delete_poll_foodlist_sql="DELETE FROM food_list WHERE id=".$click_id;
    $delete_poll_foodlist_result=mysqli_query($conn, $delete_poll_foodlist_sql);
    
    $delete_usersaved_sql="DELETE FROM user_saved WHERE food_list_id=".$click_id;
    $delete_usersaved_result=mysqli_query($conn, $delete_usersaved_sql);
    
    $conn->close();
    
    
    $_SESSION['mypoll-deleted']=false;
              
     header("Location: MyPolls.php?oauth_token=".$_SESSION['oauth_token']."&oauth_verifier=".$_SESSION['oauth_verifier']);

?>