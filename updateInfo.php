<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepageStyle.css">
    <title>Update Info - PPP</title>
</head>
<body>
    <main id="updatePage">

        
        <?php
            include("connection.php");
            
            session_start();
            if (!isset($_SESSION["id"])) {
                header("Location: index.php");
            }
            
            $id = $_SESSION["id"];
            $sql = "SELECT * FROM User WHERE id_user ='". $id . "';";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $nome = $row['name'];
                    $email = $row['email'];
                    $password = $row['password'];
                    $gender = $row['gender'];
                    $dateOfBirth = $row['dateOfBirth'];
                }
            }
            ?>
        <h1>Edit User</h1>
        <form name="form1" id="form1" method="post" action="updateInfo_php.php">
            <div>
                <label for="nome">Name:</label>
                <input type="text" name="name" value="<?php echo $nome ?>"><br>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $email ?>"><br>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" value="<?php echo $password ?>"><br>
            </div>
            <div>
                <label for="gender">Date of birth</label>
                <select name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="PNTS">Prefer not to say</option>
                </select>
            </div>
            <div>
                <label for="date">Date of birth</label>
                <input type="date" name="date" value="<?php echo $dateOfBirth ?>"><br>
            </div>
            <input type="submit" value="Enviar">
        </form>
    </main>
    </body>
    </html>