<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../backend/main.css">
    <title>Header</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <h2>
                <a href="main.php">
                    SOLVI
                </a>
            </h2>
        </div>
        <div class="links">
            <?php
            if (isset($_SESSION["username"])===false){
                echo "<a href='login.php' class='link'>Login</a>";
                echo "<a href='register.php' class='link'>Register</a>";
            }
            else{
                echo "<p class='link'>Hi, ", $_SESSION["username"],"</p>";
                echo "<a href='../backend/logout.cmd.php' class='link'>Logout</a>";
            }
            ?>
        </div>
    </div>
</body>
</html>