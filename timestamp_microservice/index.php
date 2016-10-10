<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console
  $url = $_SERVER['REQUEST_URI'];
   
  if($url==="/"){
    echo "<center><h1>Time Stamp Microservice</h1></center>";
    echo "<center><h3>If you append a date string after the URL http://odetimestamp.herokuapp.com/, it would return an object containing both the Unix Timestamp and the Natural Language Date.</h3></center>";
    echo "<center><h3>The date string you append after the URL can be either a Unix Timestamp number or a date separated by % in the format (e.g. January%1%2016).</h3><center>";
    echo "<center><h4 style='color:red; background-color:pink; display: inline'>example: http://odetimestamp.herokuapp.com/December%15%2015 </h4></center><br>";
    echo "<center><h4 style='color:red; background-color:pink; display: inline'>example: http://odetimestamp.herokuapp.com/1450137600 </h4></center><br>";
    echo "<center><h4 style='color:red; background-color:pink; display: inline'>output: { 'unix': 1450137600, 'natural': 'December 15, 2015' }</h4></center>";
    echo "<center><h3>If you append a date string without following the format above,it would return 'Bad Request'</h3></center>";
    echo "<center><h4 style='color:red; background-color:pink; display: inline'>example: http://odetimestamp.herokuapp.com/December%2015,%2015 </h4></center><br>";
    echo "<center><h4 style='color:red; background-color:pink; display: inline'>output: 'Bad Request'</h4></center>";
  }
  else{
    $url=substr($url,1);
    $answer=is_numeric($url);
    if($answer){
      
      if(strlen($url)<10){
        echo "Bad Request";
      }
      else{
        $result= date('F d, Y', $url);
     
        echo "{ 'unix' : {$url} ,  natural' : {$result} }"; 
      }
      
    }
    else{
       print_r (explode("%",$url));
    }
  }
 
 

?>
</body>
</html>