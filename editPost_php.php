<html>
    <head>
        <title>Editing User</title>
    </head>
    <body>
        <?php
            include("connection.php");

            session_start();
            if (!isset($_SESSION["id"])) {
                header("Location: index.php");
            }

            $id = $_SESSION["id"];
            $idPost = $_SESSION["idPost"];
            $content = $_POST['content'];
            $sql = "UPDATE Post SET content = '$content', timePosted = NOW() WHERE id_post = $idPost";
            $result = $connection->query($sql);

            if ($result === TRUE) {
?>
<script>
    alert('Post editado com sucesso!!!');
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