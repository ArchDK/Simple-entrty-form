<?php
$userErrorList = ["usernametaken","usernamelong","usernameshort","userpassnotfound"];
$passErrorList = ["passshort","passlong","userpassnotfound"];

function checkUsername($username,$userData){
    if (strlen($username)>9) return 2;
    if (strlen($username)<4) return 3;
    if ($arr = array_search($username,$userData,true))return $arr;    
    return false;
}
function checkPassword($pass,$userPass){
    if (password_verify($pass,$userPass)===true) return 1;
    return 0;
}
function validatePassword($pass){
    if(strlen($pass)<5) return 1;
    if(strlen($pass)>12) return 2;
    return 0;
}
function getData(){
    $data = fopen("data.txt","a+");
    if (filesize("data.txt")==0) return [];
    $dataString = fread($data,filesize("data.txt")-1);
    $dataList = explode("\n",$dataString);
    $dataArray= array();
    foreach ($dataList as $datas){
        $values = explode(" ",$datas);
        $dataArray[$values[1]] = $values[0];
    }
    fclose($data);
    return $dataArray;
}
function writeNewUser($username,$pass){
    $data = fopen("data.txt","a+");
    $encriptedPass = password_hash($pass,PASSWORD_DEFAULT);
    fseek($data, -1, SEEK_END);
    fwrite($data,$username." ".$encriptedPass."\n");
    fclose($data);
}
function createUser($username, $pass){
    global $userErrorList, $passErrorList;
    $data = getData();
    $userData = checkUsername($username,$data);
    if($userData==2) {
        header("location: ../frontend/register.php?error=".$userErrorList[1]);
        exit();
    }elseif($userData==3){
        header("location: ../frontend/register.php?error=".$userErrorList[2]);
        exit();
    }else if ($userData!=false){
        header("location: ../frontend/register.php?error=".$userErrorList[0]);
        exit();
    } 
    $check = validatePassword($pass);
    if($check==1){
        header("location: ../frontend/register.php?error=".$passErrorList[0]);
        exit();
    }else if($check==2){
        header("location: ../frontend/register.php?error=".$passErrorList[1]);
        exit();
    }
    writeNewUser($username,$pass);
    header("location: ../frontend/main.php");
}
function loginUser($username, $pass){
    global $userErrorList,$passErrorList;
    $data = getData();
    $userPass = checkUsername($username,$data);
    if ($userPass ==false){
        header("../frontend/main.php?"+$userErrorList[3]);
        exit();
    }
    $check = checkPassword($pass,$userPass);
    if($check==0){
        header("location: ../frontend/login.php?error=".$passErrorList[2]);
        exit();
    }
    session_start();
    $_SESSION["username"] = $username;
    header("location: ../frontend/main.php");
    exit(); 
}