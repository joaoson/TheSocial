<?php
    $dbServerName = 'sql106.infinityfree.com';
    $dbUserName = 'if0_35456463';
    $dbPassword = 't6NLXNSXCDUNo';
    $dbName = 'if0_35456463_TheSocial';

    $connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);
    if($connection->connect_error) {
        echo "$connection->connect_error";
        die("Connection failed: " . $connection->connect_error);
    }
?>
