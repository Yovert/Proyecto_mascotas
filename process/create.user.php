<?php
require_once(__DIR__ ."/../controller/user.controller.php");

$user = new UserController;
$userR = new User;
$userR->name =  $_POST["name"];
$userR->username = $_POST["username"];
$userR->email = $_POST["email"];
$userR->password = $_POST["password"];
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
if ( $userR->password == "") {
    $validar = false;
    $error["password"] = "Campo obligatorio";
}

if ($validar) {
    $status = $user->create($userR);
    if ($status) {
        echo"Guardado";
    } else {
        echo "Sin Guardar";
    }
}

