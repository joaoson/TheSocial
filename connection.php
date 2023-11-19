<?php
    $dbServerName = 'sql10.freesqldatabase.com';
    $dbUserName = 'sql10663447';
    $dbPassword = 'uiiCfJ9Ens';
    $dbName = 'sql10663447';

    $connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);
    if($connection->connect_error) {
        echo "$connection->connect_error";
        die("Connection failed: " . $connection->connect_error);
    }
?>