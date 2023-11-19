<?php
    ob_start();
    include_once 'connection.php';


    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: index.php");
    }
    $id = $_SESSION["id"];


    $content = mysqli_real_escape_string($connection, $_POST['content']);
    

    $sqlPost = "INSERT INTO Post (content, timePosted, fk_User_id_user) VALUES ('$content', NOW(), '$id')";

    if(mysqli_query($connection, $sqlPost)) {
        echo 'Success!';
        header("Location:homepage.php");
    } else {
        echo 'Error! Could not able to execute $sql' . mysqli_error($connection);
    }



mysqli_close($connection);          

ob_end_flush();
?>