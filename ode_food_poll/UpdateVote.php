 <script type="text/javascript">
    
   
       
       // window.location.href = "VotingPollIn.php";
       
 
 </script>
 
 <?php
      session_start();
      echo $_SESSION['click_id'];
      echo "<br />";
      echo $_POST["votevalue"];
 
 ?>