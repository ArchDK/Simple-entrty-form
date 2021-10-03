<?php

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $pass = $_POST["password"];
        
        require_once 'function.cmd.php';
        
        createUser($username, $pass);
    }else{
        header("location: ../frontend/register.php?error=none");
        exit();
    }
