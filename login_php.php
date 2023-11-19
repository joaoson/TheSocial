<?php
    include("connection.php");

    $email = $_POST["emailLogin"];
    $password = $_POST["passwordLogin"];

    $sql = "SELECT id_user, email, password FROM user WHERE email = '$email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["password"] == $password) {
                session_start();
                $_SESSION["id"] = intval($row["id_user"]);
                header("Location: homepage.php");
            }
            else {
?>
<script>
    alert("Senha não confere");
    history.go(-1);
</script>
<?php
            }
        }
    }
    else {
?>
<script>
    alert("Login não confere");
    history.go(-1);
</script>
<?php
    }
?>