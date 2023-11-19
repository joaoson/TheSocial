<?php
    ob_start();
    include_once 'connection.php';


    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);


    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);

    $sql = "INSERT INTO user (name, email, password, dateOfBirth, gender) VALUES ('$name','$email','$password', '$date','$gender')";

    if(mysqli_query($connection, $sql)) {
        echo 'Success!';
        $sql2 = "SELECT * FROM user WHERE email ='". $email . "';";
        $result2 = mysqli_query($connection, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        session_start();
        $_SESSION['id'] = $row2['id_user'];
        header("Location:homepage.php");
    } else {
        echo 'Error! Could not able to execute $sql' . mysqli_error($connection);
    }



mysqli_close($connection);          

ob_end_flush();
?>