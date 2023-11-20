<?php
    include("connection.php");

    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: index.php");
    }
    $id = $_SESSION["id"];
    $_SESSION["id"] = $id;

    
        $idPost = htmlspecialchars($_GET["idPost"]);
        $sql = "DELETE FROM Post WHERE id_post = $idPost";
        $result = $connection->query($sql);

        if ($result === TRUE) {
?>
<script>
    alert('Post removido com sucesso!!!');
    location.href = 'homepage.php';
</script>
    <?php
}

else{
    ?>
<script>
    alert('Algo não deu certo...');
    history.go(-1);
</script>
<?php
    }   
?>