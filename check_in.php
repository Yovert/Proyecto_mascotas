<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check in</title>
    <link rel="stylesheet" href="css/style_checkIn.css">
    <link rel="icon" href="love.png">
</head>
<body>
    <main class="Tasks">
        <section class="check_in">
            <div class="check_in--title">
                <h1>Check In</h1>
            </div>
            <form action="" method="post">
                <div class="check_in--data">
                    <label for="">Name:</label>
                    <input type="text" name="name">
                </div>
                <div class="check_in--data">
                    <label for="">User Name:</label>
                    <input type="text" name="username">
                </div>
                <div class="check_in--data">
                    <label for="">Email:</label>
                    <input type="email" name="email">
                </div>
                <div class="check_in--data photho">
                    <label for="">Password:</label>
                    <input type="password" name="password">
                </div>
                <div class="check_in--data__image">
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

<?php

require_once (__DIR__ . "/Model/user.model.php");

