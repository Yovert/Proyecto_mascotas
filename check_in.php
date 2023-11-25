<?php
require_once(__DIR__ ."/vendor/autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once(__DIR__ ."/controller/roles.controller.php");

if (isset($_POST["register"])) {
    require_once (__DIR__ ."/process/create.user.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check in</title>
    <link rel="stylesheet" href="css/style_checkIn.css" type="text/css">
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
        <section class="check_in">
            <picture class="logo">
                <img src="images/Logo.png" alt="">
            </picture>
            <div class="check_in--title">
                <h2>Check In</h2>
            </div>
            <form action="" method="post">
                <div class="rol"> 
                    <label for="">Rol:</label>
                    <select name="Roles_id" id="">
                        <?php
                            $display =(new RolesController())->read();
                            foreach($display as $key => $value):         
                        ?>                    
                            <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="check_in--data">
                    <label for="">Name:</label>
                    <input type="text" name="name" value="<?php echo $_POST['name'] ?? "" ?>">
                    <?php echo $error["name"] ?? "" ?>
                </div>
                <div class="check_in--data">
                    <label for="">User Name:</label>
                    <input type="text" name="username" value="<?php echo $_POST['username'] ?? "" ?>">
                    <?php echo $error["username"] ?? "" ?>
                </div>
                <div class="check_in--data">
                    <label for="">Email:</label>
                    <input type="email" name="email" value="<?php echo $_POST['email'] ?? "" ?>">
                    <?php echo $error["email"] ?? "" ?>
                </div>
                <div class="check_in--data">
                    <label for="">Password:</label>
                    <input type="text" name="password" value="<?php echo $_POST['password'] ?? "" ?>">
                    <?php echo $error["password"] ?? "" ?>
                    </div>
                <div class="file-input">
                    <label for="upload">
                        Subir archivo
                        <img src="./images/dowload.png" alt="Icono de subir">
                        </label>
                    <input type="file" id="upload">
                </div>
                <div class="check_in--btn">
                    <input type="submit" name="register" value="Register">
                </div>
            </form> 
        </section>
    </main>
</body>
<script src="./js/main.js"></script>
</html>




