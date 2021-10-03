<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../backend/main.css">
    <title>Register</title>
</head>
<body>
    <?php
            include_once("header.php");
    ?>
    <div class="layout">
        <div class="layoutItem">
            <h1>
                Register
            </h1>
        </div>
        <div class="layoutItem">
            <form method="POST" onsubmit="" action="../backend/register.cmd.php" class="form">
                <div class="input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="username">
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="password">
                </div>
                <input type="submit" value="Register" name="submit">
            </form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="usernametaken"){
                        echo "<p class='errorNote'>Username has been taken!</p>";
                    }else if($_GET["error"]=="usernamelong"||$_GET["error"]=="usernameshort"){
                        echo "<p class='errorNote'>Username must be between 4-9 characther!</p>";
                    }else if($_GET["error"]=="passlong"||$_GET["error"]=="passshort"){
                        echo "<p class='errorNote'>Password must be between 5-12 characther!</p>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>