<?php

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $pass = $_POST["password"];
        
        require_once './function.cmd.php';
        
        loginUser($username, $pass);
    }else{
        header("location: ../html/login.php?error=none");
        exit();
    }
