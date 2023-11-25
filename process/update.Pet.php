<?php
require_once(__DIR__ . "/../controller/pet.controller.php");

$Npet = new Pet_controller;
$newName = new Pets;

$newName->id= $_POST['idUpdate'];
$newName->name = $_POST['namePet'];
$newName->birthDate = $_POST['birthDate'];
$newName->PetType_id = $_POST['petType_id'];
$newName->Race_id=$_POST['race_id'];


if ($Npet->update($newName)) {
    echo 'Actualizado coorrectamente';
} else {
    echo 'Error';
}
