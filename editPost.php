<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepageStyle.css">
    <title>Update Post - PPP</title>
</head>
<body>
    <main id="updatePage">

        
        <?php
            include("connection.php");
            
            session_start();
            if (!isset($_SESSION["id"])) {
                header("Location: index.php");
            }
            $idPost = htmlspecialchars($_GET["idPost"]);
            
            $id = $_SESSION["id"];
            $sql = "SELECT * FROM Post WHERE id_post ='". $idPost . "';";
            $_SESSION["idPost"] = $idPost;
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $content = $row['content'];
                }
            }
            ?>
        <h1>Edit Post</h1>
        <form name="form1" id="form1" method="post" action="editPost_php.php">
            <div class="textArea">
                <label for="nome">Content:</label>
                <textarea name="content" id="content" cols="30" rows="10" ><?php echo $content?></textarea>
            </div>
            <input type="submit" value="Edit">
        </form>
    </main>
    </body>
    </html>