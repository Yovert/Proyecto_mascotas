<?php
require_once(__DIR__ ."/../controller/user.controller.php");

$user = new UserController;
$userR = new User;
$userR->name =  $_POST["name"];
$userR->username = $_POST["username"];
$userR->email = $_POST["email"];
$userR->RoleId = $_POST["Roles_id"];
$userR->password =(password_hash(($_POST["password"]), PASSWORD_DEFAULT));
$cant = strlen($_POST["password"]);
$validar = true;
$status=true;
if ($userR->name == "" ) {
    $validar = false;
    $error["name"] = "Campo obligatorio";
}
if ( $userR->username == "") {
    $validar = false;
    $error["username"] = "Campo obligatorio";
}
if ( $userR->email == "") {
    $validar = false;
    $error["email"] = "Campo obligatorio";
}
if ($_POST["password"] == "") {
    $validar = false;
    $error["password"] = "Campo obligatorio";
    
}elseif($_POST["password"] != ""){
    if(!preg_match("/[!@#$%^&*()_+=\[\]{};:,<.>?~]/", $_POST["password"]))
    {
        $validar = false;
        $error["password"] = "Minimum 1 special character";
    }
    if($cant < 5){
        $validar = false;
        $error["password"] = "Minimum 5 characters";
    }
} else{
    $error["password"] = "";
}

if ($validar) {
    $status = $user->create($userR);
    header("location:login.php");
}

