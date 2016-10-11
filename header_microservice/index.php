<html><body>
<?php
    $lang =explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    echo "ip address: {$lang[0] }";
    echo $_SERVER['REMOTE_ADDR'];
    $software=explode("(", $_SERVER['HTTP_USER_AGENT'])[1];
    $software=explode(")", $software)[0];
    echo $software;
?>
</body>
</html>