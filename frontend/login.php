<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../backend/main.css">
    <title>Login</title>
</head>
<body>
    <?php
            include_once("header.php");
    ?>
    <div class="layout">
        <div class="layoutItem">
            <h1>
                Login
            </h1>
        </div>
        <div class="layoutItem">
            <form method="POST" onsubmit="" action="../backend/login.cmd.php" class="form">
                <div class="input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="username">
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="password">
                </div>
                <input type="submit" type="submit" value="Register" name="submit">
            </form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="userpassnotfound"){
                        echo "<p class='errorNote'>Username or password is wrong!</p>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>