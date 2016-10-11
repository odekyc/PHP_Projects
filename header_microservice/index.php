<html><body>
<?php
    $lang =explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    echo "ip address: { $_SERVER['REMOTE_ADDR'] }";
    echo "language: {$lang[0] }";
    $software=explode("(", $_SERVER['HTTP_USER_AGENT'])[1];
    $software=explode(")", $software)[0];
    echo "software: {$software}";
?>
</body>
</html>