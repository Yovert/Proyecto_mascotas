<?php 
require_once(__DIR__ ."/vendor/autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once(__DIR__ ."/controller/conexion.php");
    
if(isset($_POST["getInto"])) {
    $mysqli = new Connection;
    $mysqli = $mysqli->connect();

    $username = $mysqli->real_escape_string($_POST["user"]);
    $password = $mysqli->real_escape_string($_POST["password"]);
    $sql = $mysqli->query("SELECT * FROM user where username = '$username' ") ;
    $result = mysqli_num_rows($sql);
    $passwC = mysqli_fetch_array($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style_login.css">
    <link rel="stylesheet" href="css/style_header.css">
    <link rel="shortcut icon" href="images/logo.png">
</head>
<body>
        <header class="links">
            <picture class="icon">
                <img src="./images/logo.png" alt="">
            </picture>
            <div>
                <h1>¡Welcome Vet Clinic Health & Love!</h1>
            </div>
            <div class="links_login">
                <input type="submit" name="signIn" value="Sign in" id="signIn">
                <input type="submit" name="checkIn" value="Check in" id="checkIn">
            </div>
        </header>
    <main class="Tasks">
        <section class="getInto">
            <picture class="image_present">
                <img src="images/pet_libro.jpg" alt="Puppy in a book">
            </picture>
            <div class="getInto__title">
                <h2>Start Section</h2>
            </div>
            <form action="" method="post">
                <div class="getInto__data">
                    <label for="">User:</label>
                    <input type="text" name="user">
                </div>
                <div class="getInto__data">
                    <label for="">Password:</label>
                    <input type="password" name="password">
                    <?php 
                     if($result > 0 && password_verify($password, $passwC["password"])) {
                        session_start();
                        $_SESSION['id'] = $passwC['id'];
                        $_SESSION['name'] = $passwC['username'];
                        $_SESSION['rol']= $passwC['Role_id'];
                        if($_SESSION['rol'] == 2){
                            header("location:Homepage.php");
                        } else {
                            header("location:services.php");
                        }
                    }else{
                        echo"Usuario incorrecto";
                    }
                    
                    ?>
                </div>
                <div class="getInto__btn">
                    <input type="submit" value="Enter" name="getInto">
                </div>
            </form>
        </section>
    </main>
</body>
<script src="./js/main.js"></script>
</html>


