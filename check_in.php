<?php
require_once(__DIR__ ."/vendor/autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_POST["register"])) {
    require_once (__DIR__ ."/process/create.user.php");
}

// require_once (__DIR__ ."/controller/roles.controller.php");

// $hola = new RolesController;
// $hola->create();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check in</title>
    <link rel="stylesheet" href="css/style_checkIn.css" type="text/css">
    <link rel="shortcut icon" href="images/logo.png">
</head>
<body>
    <main class="Tasks">
        <div class="image">
            <picture>
                <img src="images/doct_pets.jpg" alt="Juguetes">
            </picture>
        </div>
        <section class="check_in">
            <picture class="logo">
                <img src="images/Logo.png" alt="">
            </picture>
            <div class="check_in--title">
                <h1>Check In</h1>
            </div>
            <form action="" method="post">
                <div class="check_in--data">
                    <label for="">Name:</label>
                    <input type="text" name="name" value="<?php echo $_POST['name'] ?? "" ?>">
                    <?php echo $error["name"] ?? "" ?>
                </div>
                <div class="check_in--data">
                    <label for="">User Name:</label>
                    <input type="text" name="username">
                    <?php echo $error["username"] ?? "" ?>
                </div>
                <div class="check_in--data">
                    <label for="">Email:</label>
                    <input type="email" name="email">
                    <?php echo $error["email"] ?? "" ?>
                </div>
                <div class="check_in--data">
                    <label for="">Password:</label>
                    <input type="text" name="password">
                    <?php echo $error["password"] ?? "" ?>
                </div>
                <div class="check_in--data__image photho">
                    <label for="">Photho:</label>
                    <input type="file" name="Photho" id="">
                </div>
                <div class="check_in--btn">
                    <input type="submit" name="register" value="Register">
                </div>
            </form> 
        </section>
    </main>
</body>
</html>




