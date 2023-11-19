
<?php
    include_once 'connection.php';
    ?>

<?php $joao?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylelogin.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class='center'>
            <h1>Welcome to JoaoSocial</h1>

            <div class="profileCard">
                <form id="form" name="form" action="" method="get">
                    <div class="inputs">
                        <div class="input">
                            <label for="login">Username</label>
                            <input type="text" name="login" id="login" value="">
                        </div>
                        <div class="input">
                            <label for="senha" >Password</label>
                            <input type="text" id="senha" name="senha">
                        </div>
                    </div>
                    <button type="submit" name="entrar">Log-in</button>
                </form>
            </div>
        </div>
    </main>
    <?php
    if (isset($_GET['senha'])){
        $verifica = "SELECT * FROM usuarios WHERE Name =
    '".$login."' AND Curitiba = '".$senha."';";
        echo $verifica;
    } 

    
    if (isset($_GET['entrar'])) {
    $login = $_GET['login'];
    $entrar = $_GET['entrar'];
    $senha = $_GET['senha'];

    $verifica = "SELECT * FROM user WHERE Username =
    '".$login."' AND Password = '".$senha."';";
    $result = mysqli_query($connection, $verifica);
    $resultCheck = mysqli_num_rows($result);
        if ($resultCheck<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');
            window.location.href='login.php';</script>";
            die();
        }else{
            setcookie("login",$login);  
            header("Location:users.php");
        }
  }
?>


</body>
</html>

