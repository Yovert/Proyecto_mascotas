<?php
require_once(__DIR__ ."/../Model/Pets.model.php");
require_once(__DIR__ ."/conexion.php");
 
class Pet_controller extends Connection {
    public function create(Pets $pet) {
        session_start();
        $mysqli = $this->connect();
        $name = $mysqli->real_escape_string($pet->name);
        $birthDate =$pet->birthDate;
        $User_id = $_SESSION['id']; 
        $PetType_id =$pet->PetType_id;
        $Race_id =$pet->Race_id;
        $sql = "INSERT INTO mascota (nombre, FechaNacimiento, User_id, TipoMascota_id, Raza_id) 
        VALUES ('$name', '$birthDate' ,'$User_id' , '$PetType_id', '$Race_id')";
        $mysqli->query($sql);
    }
    public function read(): array{ 
        $conexion = $this->connect();
        $array = [];
        $sql = "SELECT * FROM mascota";
        $result = $conexion->query($sql);
        while($row = $result->fetch_assoc()){
            $data = new Pets;
            $data->id = $row["id"];
            $data->name = $row["nombre"];
            $data->PetType_id = $row["TipoMascota_id"];
            $data->Race_id = $row["Raza_id"];
            $data->birthDate = $row["FechaNacimiento"];
            $array[]= $data;
        }
        return $array;
    } 
    public function nameRace($id){
        $conexion = $this->connect();
        $result= $conexion->query("SELECT nombre FROM raza WHERE  id= $id");
        $row = $result->fetch_assoc();
        $conexion->close();
        return $row['nombre'];
    }
    public function namePetType($type){
        $conexion = $this->connect();
        $consult =$conexion->query("SELECT nombre FROM tipomascota WHERE  id= $type");
        $row = $consult->fetch_assoc();
        $conexion->close();
        return $row['nombre'];
    }
    public function update(Pets $Newdata){
        session_start();
        $conexion = $this->connect();
        $Newname = $conexion->real_escape_string($Newdata->name);
        $NewbirthDate = $Newdata->birthDate;
        $NewUser_id = $Newdata->$_SESSION['id']; 
        $NewpetType_id = $Newdata->PetType_id;
        $Newrace_id = $Newdata->Race_id;
        $consult = "UPDATE mascota SET nombre= '$Newname', FechaNacimiento='$NewbirthDate', 
        User_id=$NewUser_id, TipoMascota_id=$NewpetType_id, Raza_id=$Newrace_id WHERE id=$Newdata->id";
        $result = $conexion->query($consult);
        return $result;
    }
    public function delete($id){
        $conexion = $this->connect();
        $sql = "DELETE FROM mascota WHERE id = $id";
        $conexion->query($sql);
    }
}