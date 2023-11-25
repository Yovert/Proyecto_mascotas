<?php
require_once(__DIR__ ."/../controller/petType.controller.php");

$petType = new PetType_controller;
$petTypes = new PetType;
$petTypes->name = $_POST['Type_pet'];