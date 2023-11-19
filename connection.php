<?php
    $dbServerName = '127.0.0.1:3306';
    $dbUserName = 'root';
    $dbPassword = 'PUC@2023';
    $dbName = 'TheSocial';

    $connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);
    if($connection->connect_error) {
        echo "$connection->connect_error";
        die("Connection failed: " . $connection->connect_error);
    }
?>