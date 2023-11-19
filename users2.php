<?php
            include("connection2.php");
            $sql3 = "SELECT * FROM User";
            $result3 = mysqli_query($connection, $sql3);
            $row3 = mysqli_fetch_assoc($result3);


?>

            <?php
                echo "<p> Nome: " .   $row3['name'] . "</p>";
                echo "<p> Email: "  .   $row3['email'] . "</p>";
                echo "<p> Gender: "  .   $row3['gender'] . "</p>";
            ?>