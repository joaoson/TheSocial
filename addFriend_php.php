<?php
    ob_start();
    include_once 'connection.php';

    session_start();
    $id = $_SESSION["id"];
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    $idFriend = htmlspecialchars($_GET["idFriend"]);

    $sql = "INSERT into Friends(fk_User_id_user,fk_User_id_userFriend) values ($id,$idFriend);";

    if(mysqli_query($connection, $sql)) {
        echo 'Success!';
        header("Location:homepage.php");
    } else {
        echo 'Error! Could not able to execute $sql' . mysqli_error($connection);
    }



mysqli_close($connection);          

ob_end_flush();
?>