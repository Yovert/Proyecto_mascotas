<?php
require_once(__DIR__ ."/../controller/raza.controller.php");


$raza = new Raza_controller;
$race = new Race;
$race->name = $_POST['raza'];
$race->petTypeId = $_POST['petType_id'];
if($raza->create($race)){
    echo "Register exitoso";
} else{
    echo "error";
}