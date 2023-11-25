<?php 
require_once(__DIR__ . "/../Model/raza.model.php");
require_once(__DIR__ . "/conexion.php");

class Raza_controller extends Connection{

    public function create(Race $race){
        $mysqli= $this->connect();
        $name = $mysqli->real_escape_string($race->name);
        $petType = $race->petTypeId;
        $sql = "INSERT INTO raza (nombre, TipoMascota_id) VALUES ('$name', '$petType')";
        return $mysqli->query($sql);
    }
    public function read(): array{
        $conexion = $this->connect();
        $array = [];
        $sql = "SELECT id, nombre FROM raza";
        $result = $conexion->query($sql);
        while($row = $result->fetch_assoc()){
            $data = new Race;
            $data->id = $row["id"];
            $data->name = $row["nombre"];
            $array[]= $data;
        }
        return $array;
    }
    public function nameRace($race){
        $conexion = $this->connect();
        $consult =$conexion->query("SELECT nombre FROM raza WHERE  id= $race");
        $row = $consult->fetch_assoc();
        $conexion->close();
        return $row['nombre'];
    }
}