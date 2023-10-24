<?php

require_once(__DIR__ . './conexion.php');
require_once(__DIR__ . "/Model/user.model.php");

class UserController extends Connection
{

    public function create(User $user){
        $mysqli = $this->connect();
        $name = $mysqli->real_escape_string($user->name);
        $password = $mysqli->real_escape_string($user->password);
        $username = $mysqli->real_escape_string($user->username);
        $email = $mysqli->real_escape_string($user->email);
        $photho = $mysqli->real_escape_string($user->photo);
        $id = $mysqli->real_escape_string($user->id);
        $sql = "INSERT INTO user (id, nombre, username, email, password, Role_id, foto) VALUES ('$id','$name','$username', '$email', '$password', '$photho')";
        if ($mysqli->query($sql)){
            echo"Registro Exitoso";
        } else{
            echo "Error al crear registro" . $mysqli->error;
        }
        $mysqli->close();
    }
}
?>