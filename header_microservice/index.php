<html><body>
<?php

    echo "<h3>ip address: {$_SERVER['REMOTE_ADDR']}</h3><br>";
    $lang =explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    echo "<h3>language: {$lang[0] }</h3><br >";
    $software=explode("(", $_SERVER['HTTP_USER_AGENT'])[1];
    $software=explode(")", $software)[0];
    echo "<h3>software: {$software}</h3><br>";
?>
</body>
</html>