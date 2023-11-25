<?php 

require_once(__DIR__ . "/../controller/pet.controller.php");

$pet = new Pet_controller;
$pets = new Pets;

$pets->name = $_POST['namePet'];
$pets->birthDate = $_POST['birthDate'];
$pets->PetType_id = $_POST['petType_id'];
$pets->Race_id=$_POST['race_id'];

$pet->create($pets);




