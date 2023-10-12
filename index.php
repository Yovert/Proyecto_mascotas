<h1>Hola soy el index</h1>
<link rel="stylesheet" href="css/style.css">
<?php
require_once __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once(__DIR__ . '/controller/conexion.php');

$conn = new Connection;
$conn->connect();
if (isset($_SESSION['user'])){
    echo "<br/>";
    echo "\n \n No se ha logueado";
    session_start();
    $_SESSION['user'] = "Yovert";
}
else {
    global $_SESSION;
    echo "<br/>";
    echo "\n \n  A sido logueado";
    echo $_SESSION['user'] ?? " Hola";
    echo DIRECTORY_SEPARATOR;
}
?>