<?php
require_once(__DIR__ . "/vendor/autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once(__DIR__ . "/controller/pet.controller.php");
require_once(__DIR__ . "/controller/petType.controller.php");
require_once(__DIR__ . "/controller/raza.controller.php");
if (isset($_POST["register"])) {
    require_once(__DIR__ . "/process/create.pets.php");
}
if (isset($_POST['services'])) {
    header("location:services.php");
}
if (isset($_POST['CrudUpdate'])) {
    require_once(__DIR__ . "/process/update.Pet.php");
}
if (isset($_POST['delete'])) {
    $delete = (new Pet_controller());
    $delete->delete($_POST['idDelete']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="css/style_homepage.css">
    <link rel="icon" href="./images/Logo.png">
</head>

<body>
    <header class="links">
        <picture class="icon">
            <img src="./images/Logo.png" alt="logo">
        </picture>
        <form action="" method="post">
            <div class="menu">
                <button name="services">Services</button>
            </div>
        </form>
        <div class="menu">
            <button id="Create">Create Pet</button>
            <button id="UpdateC">Update Pet</button>
            <button id="Remove">Delete Pet</button>
        </div>
    </header>
    <main class="Tasks">
        <section class="major">
            <section class="content">
                <div>
                    <h1>Welcome thank you for being part of our family.
                        <br>Enjoy our services
                    </h1>
                </div>
                <section class="table">
                    <?php
                    $result = (new Pet_controller())->read();
                    $nameS = (new Pet_controller());
                    ?>

                    <div class="added_info">
                        <div class="column_name">
                            <p>ID</p>
                        </div>
                        <?php
                        foreach ($result as $Value) :
                            echo "<p>" . $Value->id . "</p>" . "</br>";
                        endforeach
                        ?>
                    </div>
                    <div class="added_info">
                        <div class="column_name">
                            <p>Name</p>
                        </div>
                        <?php
                        foreach ($result as $Value) :
                            echo "<p>" . $Value->name . "</p>" . "</br>";
                        endforeach
                        ?>
                    </div>
                    <div class="added_info">
                        <div class="column_name">
                            <p>Pet Type</p>
                        </div>
                        <?php
                        foreach ($result as $Value) :
                            echo "<p>" . $nameS->namePetType($Value->PetType_id) . "</p>" . "</br>";
                        endforeach
                        ?>
                    </div>
                    <div class="added_info">
                        <div class="column_name">
                            <p>Race</p>
                        </div>
                        <?php
                        foreach ($result as $Value) :
                            echo "<p>" . $nameS->nameRace($Value->Race_id) . "</p>" . "</br>";
                        endforeach
                        ?>
                    </div>
                    <div class="added_info">
                        <div class="column_name">
                            <p>BirthDate</p>
                        </div>
                        <?php
                        foreach ($result as $Value) :
                            echo "<p>" . $Value->birthDate . "</p>" . "</br>";
                        endforeach
                        ?>
                    </div>

                </section>
            </section>
            <section class="checkIn_pet" id="check_in">
                <div class="checkIn_data">
                    <h2>Check in Pet</h2>
                    <form action="" method="post" class="form_pet">
                        <div class="checkIn_pet--info">
                            <label for="">Name:</label>
                            <input type="text" name="namePet">
                        </div>
                        <div class="checkIn_pet--info">
                            <label for="">Birth Date:</label>
                            <input type="date" name="birthDate" id="">
                        </div>
                        <div class="file-input">
                            <label for="upload">
                                Subir archivo
                                <img src="./images/dowload.png" alt="Icono de subir">
                            </label>
                            <input type="file" id="upload">
                        </div>
                        <div class="checkIn_pet--types">
                            <label for="">Pet Types:</label>
                            <select name="petType_id" id="">
                                <?php
                                $petType = (new PetType_controller())->read();
                                foreach ($petType as $key => $Value) :
                                ?>
                                    <option value="<?php echo $Value->id ?>"><?php echo $Value->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="checkIn_pet--types">
                            <label for="">Race:</label>
                            <select name="race_id" id="">
                                <?php
                                $races = (new Raza_controller())->read();
                                foreach ($races as $key => $values) :
                                ?>
                                    <option value="<?php echo $values->id ?>"><?php echo $values->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="checkIn_pet--btn">
                            <input type="submit" name="register" value="Register">
                        </div>
                    </form>
                </div>
            </section>
            <section class="update_pet" id="update_pet">
                <div class="checkIn_data">
                    <h2>Update Pet</h2>
                    <form action="/proyecto_mascotas/Homepage.php" method="post" class="form_pet">
                        <div class="checkIn_pet--info">
                            <label for="">Pet ID To Update:</label>
                            <select name="idUpdate" id="">
                                <?php
                                foreach ($result as $key => $Value) :
                                ?>
                                    <option value="<?php echo $Value->id ?>"><?php echo $Value->id ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="checkIn_pet--info">
                            <label for="">Name:</label>
                            <input type=text name=namePet>
                        </div>
                        <div class="checkIn_pet--info">
                            <label for="">Birth Date:</label>
                            <input type=date name=birthDate>
                        </div>
                        <div class="file-input">
                            <label for="upload">
                                Subir archivo
                                <img src="./images/dowload.png" alt="Icono de subir">
                            </label>
                            <input type="file" id="upload">
                        </div>
                        <div class="checkIn_pet--types">
                            <label for="">Pet Types:</label>
                            <select name="petType_id" id="">
                                <?php
                                $option = (new PetType_controller())->read();
                                foreach ($option as $key => $value) :
                                ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="checkIn_pet--types">
                            <label for="">Race:</label>
                            <select name="race_id" id="">
                                <?php
                                $races = (new Raza_controller())->read();
                                foreach ($races as $key => $values) :
                                ?>
                                    <option value="<?php echo $values->id ?>"><?php echo $values->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="checkIn_pet--btn">
                            <input type="submit" name="CrudUpdate" value="Update">
                        </div>
                    </form>
                </div>
            </section>
            <section class="delete_pet" id="delete_pet">
                <h2>Delete</h2>
                <form action="" method="post">
                    <div class="delete_pet--info">
                        <label for="">Pet ID To Delete:</label>
                        <select name="idDelete" id="">
                            <?php
                            foreach ($result as $key => $Value) :
                            ?>
                                <option value="<?php echo $Value->id ?>"><?php echo $Value->id ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="checkIn_pet--btn">
                        <input type="submit" name="delete" value="Delete">
                    </div>
                </form>
            </section>

        </section>
    </main>

</body>
<script src="./js/homepage.js"></script>

</html>