<?php 
require_once(__DIR__ . "/../Model/PetType.model.php");
require_once(__DIR__ . "/conexion.php");

class PetType_controller extends Connection{

    public function create(PetType $petType){
        $mysqli= $this->connect();
        $name = $mysqli->real_escape_string($petType->name);
        $sql = "INSERT INTO tipomascota (nombre) VALUES ('$name')";
        return $mysqli->query($sql);
    }
    public function read(): array{
        $conexion = $this->connect();
        $array = [];
        $sql = "SELECT id, nombre FROM tipomascota";
        $result = $conexion->query($sql);
        while($row = $result->fetch_assoc()){
            $data = new PetType;
            $data->id = $row["id"];
            $data->name = $row["nombre"];
            $array[]= $data;
        }
        return $array;
    }
    public function namePetType($type){
        $conexion = $this->connect();
        $consult =$conexion->query("SELECT nombre FROM tipomascota WHERE  id= $type");
        $row = $consult->fetch_assoc();
        $conexion->close();
        return $row['nombre'];
    }
}