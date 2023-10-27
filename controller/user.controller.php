<?php
require_once(__DIR__ . "/../Model/user.model.php");

class UserController extends Connection
{

    public function create(User $user){
        $mysqli = $this->connect();
        $name = $mysqli->real_escape_string($user->name);
        $username = $mysqli->real_escape_string($user->username);
        $email = $mysqli->real_escape_string($user->email);
        $password = $mysqli->real_escape_string($user->password);
        $Role_id = $mysqli->real_escape_string($user->Role_id);
        
        $sql = "INSERT INTO user (id, nombre, username, email, password, Role_id) VALUES (2,'$name','$username', '$email', '$password')";
        if ($mysqli->query($sql)){
            echo"Registro Exitoso";
        } else{
            echo "Error al crear registro" . $mysqli->error;
        }
        $mysqli->close();
    }
}
?>