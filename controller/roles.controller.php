<?php
require_once(__DIR__ ."/../Model/roles.model.php");
require_once(__DIR__ ."/conexion.php");
class RolesController extends Connection
{
    public function create(){
        $mysqli = $this->connect();
        // $id = $mysqli->real_escape_string($roles->id);
        // $name = $mysqli->real_escape_string($roles->name);
        $sql = "SELECT nombre FROM role WHERE id = 2 ";
        $result = $mysqli->query($sql);
        // $mostrar = $result->fetch_all();
        // print_r($mostrar);
        // $mysqli->close();
    }
}
?>