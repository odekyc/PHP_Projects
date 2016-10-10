<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console
  $url = $_SERVER['REQUEST_URI'];
  $months = array("January", "February", "March", "April", "May", "June", "July","August", "September", "October", "November", "December");
  $months_31days= array("January", "March", "May", "July", "August", "October", "December");
  $date_valid=true;
  
  if($url==="/"){
  
    
    
    echo "<center><h1>Time Stamp Microservice</h1></center>";
    echo "<center><h3>If you append a date string after the URL http://odetimestamp.herokuapp.com/, it would return an object containing both the Unix Timestamp as of 12AM ( 0 hour 0 minite 0 second) on that date and the Natural Language Date.</h3></center>";
    echo "<center><h3>The date string you append after the URL must be either a Unix Timestamp number or a date separated by % in the format (e.g. January%1%2016).</h3><center>";
    echo "<center><h4 style='color:red; background-color:pink; display: inline'>example: http://odetimestamp.herokuapp.com/December%15%2015 </h4></center><br>";
    echo "<center><h4 style='color:red; background-color:pink; display: inline'>example: http://odetimestamp.herokuapp.com/1450137600 </h4></center><br>";
    echo "<center><h4 style='color:red; background-color:pink; display: inline'>output: { 'unix': 1450137600, 'natural': 'December 15, 2015' }</h4></center>";
    echo "<center><h3>If you append a date string without following the format above,it would return 'Bad Request'</h3></center>";
    echo "<center><h4 style='color:red; background-color:pink; display: inline'>example: http://odetimestamp.herokuapp.com/December%2015,%2015 </h4></center><br>";
    echo "<center><h4 style='color:red; background-color:pink; display: inline'>output: 'Bad Request'</h4></center>";
  }
  else{
    $url=substr($url,1);
    $is_unix=is_numeric($url);
    if($is_unix){
      
      if(strlen($url)<10){
        echo "Bad Request";
        $date_valid=false;
      }
      else{
        $result= date('F d, Y', $url);
     
        echo "{ 'unix' : {$url} ,  natural' : {$result} }"; 
      }
      
    }
    else{
      $mypos=strpos($url, "%");
      if($mypos){
        $date_arr=explode( "%",$url);
        if(sizeof($date_arr)<3){
          echo "Bad Request";
          $date_valid=false;
        }
        elseif($date_arr[2]===""){
          echo "Bad Request";
          $date_valid=false;
        }
        else{
          $nyear= $date_arr[2];
          $nmonth = array_search($date_arr[0], $months);
          $ndate = $date_arr[1];
          
          if(strlen($nyear)===4){
            
            if($nmonth or $nmonth===0){
              $nmonth+=1;
              if($ndate!==""){
                
                $is_31days_month= array_search($date_arr[0], $months_31days);
                if($nmonth===2){
                  if(($date_arr[2]%400===0) or ($date_arr[2]%4===0 and $date_arr[2]%100!==0)){
                    if($ndate>0 and $ndate<30){
                    }
                    else{
                      echo "Bad Request";
                      $date_valid=false;
                    }
                  }
                  else{
                    if($ndate>0 and $ndate<29){
                    }
                    else{
                      echo "Bad Request";
                      $date_valid=false;
                    }
                  }
                }
                
              }
              else{
                 echo "Bad Request";
                 $date_valid=false;
              }
            }
            else{
              echo "Bad Request";
              $date_valid=false;
            }
         }
         else{
           echo "Bad Request";
           $date_valid=false;
         }
        }
        
      }
      else{
        echo 'Bad Request';
        $date_valid=false;
      }
    }
      if($date_valid){
         $unix = mktime(0, 0, 0, $nmonth, $ndate, $nyear);
         $naturaldate=date('F d, Y', $unix);
         echo "{ 'unix' : {$unix} ,  natural' : {$naturaldate} }"; 
      }
  }
 
 

?>
</body>
</html>