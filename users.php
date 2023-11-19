<?php
    include_once 'connection.php';
    $var_value = $_COOKIE['login'];
    $var_value = './uploads/'.$var_value;
    $sql = "SELECT * FROM user WHERE Username ='". $_COOKIE['login'] . "';";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    if (file_exists($var_value .".jpg")){ 
        $var_value = $var_value .".jpg";
    } 
    else if(file_exists($var_value .".jpeg")){
        $var_value = $var_value .".jpeg";
    }
    else if(file_exists($var_value .".png")){
        $var_value = $var_value .".png";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./loginstyle.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1><?php echo $_COOKIE['login'];?></h1>
        <div class="profileCard">
            <img src="<?php
            echo $var_value?>" alt="">
        </div>
        <div class="information">

            <?php
                echo "<p>" .   $row['Name'] . "</p>";
                echo "<p>" .   $row['Cpf'] . "</p>";
                echo "<p>" .   $row['CEP'] . "</p>";
                echo "<p>" .   $row['City'] . "</p>";
                echo "<p>" .   $row['State'] . "</p>";
                echo "<p>" .   $row['Email'] . "</p>";
                echo "<p>" .   $row['Telefone'] . "</p>";
            ?>
        </div>
       
        <?php
            if( isset($_POST['subject']) ){ 
                    $joao = $_POST['subject'].".png";
                    echo '<img class="imagem" src="./uploads/' .$var_value . '" alt="">';
                }
        ?>
    </main>

</body>
</html>

