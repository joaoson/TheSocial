<?php
    include("connection.php");

    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: index.php");
    }

    

        $id = $_SESSION["id"];
        $sql = "DELETE FROM User WHERE id_user = $id";
        $result = $connection->query($sql);
        session_unset();

        if ($result === TRUE) {
?>
<script>
    alert('Usuário removido com sucesso!!!');
    location.href = 'index.php';
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