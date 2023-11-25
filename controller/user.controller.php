<?php
require_once(__DIR__ . "/../Model/user.model.php");
require_once(__DIR__ . "/conexion.php");

class UserController extends Connection
{

    public function create(User $user){
        $mysqli = $this->connect();
        $name = $mysqli->real_escape_string($user->name);
        $username = $mysqli->real_escape_string($user->username);
        $email = $mysqli->real_escape_string($user->email);
        $Role_id = $mysqli->real_escape_string($user->RoleId);
        $password = $mysqli->real_escape_string($user->password);
        $sql = "INSERT INTO user (nombre, username, email, password, Role_id) 
        VALUES ('$name','$username', '$email', '$password', $Role_id)";
        return $mysqli->query($sql);
    }
    public function read(){
        $mysqli = $this->connect();
        $result = $mysqli->query("SELECT nombre FROM user ");
        $row = $result->fetch_assoc();
        $mysqli->close();
        return $row['nombre'];
    }
    
}
?>