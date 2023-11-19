<html>
    <head>
        <title>Dados do usuário</title>
    </head>
    <body>
        <?php
            include("connection.php");

            session_start();
            if (!isset($_SESSION["id"])) {
                header("Location: index.php");
            }

            $id = $_SESSION["id"];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $dateOfBirth = $_POST['date'];
            $sql = "UPDATE User SET name = '$name', email = '$email', password = '$password' , gender = '$gender', dateOfBirth = '$dateOfBirth' WHERE id_user = $id";
            $result = $connection->query($sql);

            if ($result === TRUE) {
?>
<script>
    alert('Usuário editado com sucesso!!!');
    location.href = 'homepage.php';
</script>
<?php
            }
            else {
?>
<script>
    alert('Algo não deu certo...');
    history.go(-1);
</script>
<?php
            }
?>
    </body>
</html>