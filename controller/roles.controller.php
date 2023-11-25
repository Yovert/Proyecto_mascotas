<?php
require_once(__DIR__ ."/../Model/roles.model.php");
require_once(__DIR__ ."/conexion.php");
class RolesController extends Connection
{
    public function create(Role $roles){
        $mysqli = $this->connect();
        $sql = "INSERT INTO role (name) VALUES ('$roles->name')";
        return $mysqli->query($sql);
    }
    public function read(): array{
        $conexion = $this->connect();
        $array = [];
        $sql = "SELECT id, nombre FROM role";
        $result = $conexion->query($sql);
        while($row = $result->fetch_assoc()){
            $data = new Role;
            $data->id = $row["id"];
            $data->name = $row["nombre"];
            $array[]= $data;
        }
        return $array;
    }
}
?>