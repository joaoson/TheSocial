<?php
    ob_start();
    include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Form Validation
    </title>
</head>
<body>
    <main>
        <div id="formContainer">
            <div id="formNav">
                <div class="numero">
                    <span id="numero1" class="active">1</span>
                    <div class="information">
                        <h2>Step 1</h2>
                        <h3 class="caption">Account info</h3>
                    </div>
                </div>
                <div class="numero">
                    <span id="numero2">2</span>
                    <div class="information">
                        <h2>Step 2</h2>
                        <h3 class="caption">Your info</h3>
                    </div>
                </div>
                <div class="numero">
                    <span id="numero3">3</span>
                    <div class="information">
                        <h2>Step 3</h2>
                        <h3 class="caption">Location</h3>
                    </div>
                </div>
                <div class="numero">
                    <span id="numero4">4</span>
                    <div class="information">
                        <h2>Step 4</h2>
                        <h3 class="caption">Contact info</h3>
                    </div>
                </div>
            </div>
            <form enctype='multipart/form-data' id="formulario" name="formulario" action="index.php" method="post">
                <div class="infoInputs">
                    <div class="header">
                        <h2>Account Info</h2>
                        <h3>Please input your username and password</h3>
                    </div>
                    <div class="inputs">
                        <div class="input">
                            <label for="nome">Username</label>
                            <input name="username" id="username" class="text" type="text" placeholder="e.g. Linus Torvalds">
                        </div>
                        <div class="input">
                            <label for="password">Password</label>
                            <input name="password" id="password" class="password" type="text" placeholder="Minimum 8 Characters">
                        </div>
                        <div class="input">
                            <label for="password2">Confirm your password</label>
                            <input name="password2" id="password2" class="password" type="text" placeholder="">
                        </div>
                    </div>
                    <button type="button" id="button1" disabled class="button desativado">Next Step</button>
                </div>  
                <div class="infoInputs">
                    <div class="header">
                        <h2>Personal Info</h2>
                        <h3>Please input your name, cpf and your birthdate</h3>
                    </div>
                    <div class="inputs">
                        <div class="input">
                            <label for="nome">Nome</label>
                            <input name="name" id="nome" class="text" type="text" placeholder="e.g. Linus Torvalds">
                        </div>
                        <div class="input">
                            <label for="cpf">CPF</label>
                            <input name="cpf" maxlength="14" id="cpf" class="cpf" type="text" placeholder="e.g. 111.111.111-11">
                            <p></p>
                        </div>
                        <div class="input">
                            <label for="date">Data de nascimento</label>
                            <input name="data" maxlength="10" class="date" type="text" placeholder="e.g. 01/01/1990">
                        </div>
                    </div>
                    <button type="button" id="button2" disabled class="button desativado">Next Step</button>
                </div>
                <div class="infoInputs">
                    <div class="header">
                        <h2>Personal Info</h2>
                        <h3>Please input your name, cpf and your birthdate</h3>
                    </div>
                    <div class="inputs">
                        <div class="input">
                            <label for="cep">CEP</label>
                            <input name="cep" maxlength="10" id="cep" class="cep" type="text" placeholder="e.g. 11.111-111">
                        </div>
                        <div class="input">
                            <label for="cidade">Cidade</label>
                            <input name="cidade" id="cidade" class="text" type="text" placeholder="e.g. New York">
                        </div>
                        <div class="input">
                            <label for="estado">Estado</label>
                            <input name="state" maxlength="2" id="estado" class="state" type="text" placeholder="e.g. DF">
                        </div>
                    </div>
                    <button type="button" class="button desativado" id="button3">Next Step</button>
                </div>
                <div class="infoInputs">
                    <div class="header">
                        <h2>Personal Info</h2>
                        <h3>Please input your name, cpf and your birthdate</h3>
                    </div>
                    <div class="inputs">
                        <div class="input">
                            <label for="telefone">Telefone</label>
                            <input name="telefone" maxlength="15" class="telefone" id="telefone" type="text" placeholder="Digite seu Telefone">
                        </div>
                        <div class="input">
                            <label for="email">Email</label>

                            <input name="email" class="email" id="email" type="text" placeholder="Digite seu Email">
                        </div>
                        <div class="input">
                            <label for="img ">Foto</label>

                            <input class="teste" type="file" id="img" name="img" accept="image/*">
                        </div>

                    </div>
                    <button id="submit" name="submit" type="submit">Enviar Formulario</button>
                </div>
            </form>
        </div>
    </main>

    
    <?php

            if(isset($_POST['submit'])){

                ini_set('display_startup_errors', 1);
                ini_set('display_errors', 1);
                error_reporting(-1);


                $username = mysqli_real_escape_string($connection, $_POST['username']);
                $password = mysqli_real_escape_string($connection, $_POST['password']);
                $name = mysqli_real_escape_string($connection, $_POST['name']);
                $cpf = mysqli_real_escape_string($connection, $_POST['cpf']);
                $cep = mysqli_real_escape_string($connection, $_POST['cep']);
                $cidade = mysqli_real_escape_string($connection, $_POST['cidade']);
                $state = mysqli_real_escape_string($connection, $_POST['state']);
                $telefone = mysqli_real_escape_string($connection, $_POST['telefone']);
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                
                $imagem = $_FILES['img'];  
                $endArquivo = explode('.',$imagem['name']);
                move_uploaded_file($imagem['tmp_name'],'uploads/'. $username . ".". $endArquivo[sizeof($endArquivo)-1]);
                
    
                $sql = "INSERT INTO user (username, password, name, cpf, CEP, City, State, Telefone, Email) VALUES ('$username','$password','$name', '$cpf','$cep','$cidade','$state','$telefone','$email')";
    
                if(mysqli_query($connection, $sql)) {
                    echo 'Success!';
                    header("Location:login.php");
                } else {
                    echo 'Error! Could not able to execute $sql' . mysqli_error($connection);
                }
        
            }
            
            mysqli_close($connection);          
    ?>

    <script src="./index.js"></script>
</body>
</html>
<?php
ob_end_flush();
?>