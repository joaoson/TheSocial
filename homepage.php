<?php

    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: index.php");
    }
    $id = $_SESSION["id"];
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepageStyle.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>TheSocial</h1>
    </header>
    <main>
        <section id="feed">
            <h2>Main Posts</h2>
            <div class="results">

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>
            <?php
                $sql = "SELECT DISTINCT post.content,post.timePosted, friends.fk_User_id_userFriend as Autor FROM post INNER JOIN friends on (post.fk_User_id_user = friends.fk_User_id_userFriend) INNER JOIN  user on (friends.fk_User_id_user = '". $id . "') ORDER BY timePosted ASC;";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $author = $row["Autor"];
                        $sql2 = "SELECT id_user, name FROM User WHERE id_user = '$author'";
                        $result2 = $connection->query($sql2);
                        $row2 = $result2->fetch_assoc();
                        ?>
                            <div class="post">
                                <div class="postHeader">
                                    <h2><?php echo $row2["name"]?></h2>
                                    <h3><?php echo $row["timePosted"]?></h3>
                                </div>
                                <h2><?php echo $row["content"]?></h2>
                            </div>
                        <?php
                    }
                }
            ?>
            </div>
        </section>
        <section id="profileInfo">
        <div class="information">
            <?php
            $sql3 = "SELECT * FROM user WHERE id_user ='". $id . "';";
            $result3 = mysqli_query($connection, $sql3);
            $row3 = mysqli_fetch_assoc($result3);


?>
            <h1><?php echo $row3['name'];?></h1>

            <?php
                echo "<p> Name: " .   $row3['name'] . "</p>";
                echo "<p> Email: "  .   $row3['email'] . "</p>";
                echo "<p> Gender: "  .   $row3['gender'] . "</p>";
            ?>
            <div class="buttons">
                <div>
                    <a href="./updateInfo.php"><button>Update Information</button></a>
                    <a href="./removeUser.php"><button>Remove Account</button></a>
                </div>
                <div>
                    <a href=""><button id="myBtn">Write Post</button></a>
                    <a href=""><button>View My Posts</button></a>
                </div>
                <div>
                    <a href=""><button>View My Friends</button></a>
                    <a href=""><button>View Following</button></a>
                </div>
            </div>
        </div>
        <div class="Friends">
            <?php
                $sql4 = "SELECT DISTINCT u.id_user as idFriend, u.name as nome
                FROM User as u
                WHERE u.id_user <> '". $id . "'
                AND u.id_user NOT IN (
                    SELECT uf.id_user
                    FROM Friends as f
                    JOIN User uf ON f.fk_User_id_userFriend = uf.id_user
                    WHERE f.fk_User_id_user = '". $id . "'
                );";
                $result4 = $connection->query($sql4);
 
                if ($result4->num_rows > 0) {
                while ($row4 = $result4->fetch_assoc()) {
                    ?>
                    <div class="suggestion">
                        <h3> <?php echo $row4["nome"]?></h3>
                        <a href="addFriend_php.php?idFriend=<?php echo $row4["idFriend"]?>"><button>Click Here to Follow</button></a>
                    </div>


                    <?php
                }}
?>
        </div>
        </section>
    </main>
    

<script src="./homepage.js"></script>
</body>
</html>