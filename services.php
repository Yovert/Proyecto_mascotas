<?php
require_once(__DIR__ . "/vendor/autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once(__DIR__ . "/controller/raza.controller.php");
require_once(__DIR__ . "/controller/petType.controller.php");

if (isset($_POST['btn_create'])) {
    require_once(__DIR__ . "/process/create.Race.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="icon" href="./images/Logo.png">
    <link rel="stylesheet" href="css/style_services.css">
</head>

<body>
    <main class="Tasks">
        <section class="services">
            <div class="info">
                <div class="info_content">
                    <h2>Vaccine Manager</h2>
                    <p>Prevent your pet from getting common diseases.</p>
                    <div class="info_content-btn">
                        <button>Go</button>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="info_content">
                    <h2>Pet Manager</h2>
                    <p>Prevent your pet from getting common diseases.</p>
                    <div class="info_content-btn">
                        <button>Go</button>
                    </div>
                </div>
            </div>
            <div class="info ">
                <div class="info_content">
                    <h2>Pet Data Manager</h2>
                    <p>Prevent your pet from getting common diseases.</p>
                    <div class="info_content-btn">
                        <button>Go</button>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="info_content">
                    <h2>Breed Registry</h2>
                    <p>Prevent your pet from getting common diseases.</p>
                    <div class="info_content-btn">
                        <button>Go</button>
                    </div>
                </div>
            </div>
        </section>
        <div class="content_create_pet">
            <?php $result = (new Raza_controller())->read(); ?>
            <section class="table">
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
                        <p>Amount</p>
                    </div>
                    <?php
                    foreach ($result as $Value) :
                        echo "<p>" . $Value->id. "</p>" . "</br>";
                    endforeach
                    ?>
                </div>
            </section>
            <div class="create_pet">
                <h2>Add Type Pet</h2>
                <form action="" method="post">
                    <label for="">Type Pet Name:</label>
                    <input type="text" name="Type_pet" value="<?php echo $_POST['Type_pet'] ?? "" ?>">
                    <div class="btn_create">
                        <input type="submit" value="CreatePetType" name="btn_create">
                    </div>
                </form>
            </div>
            <div class="create_pet">
                <h2>Add Race Pet</h2>
                <form action="" method="post">
                    <div class="checkIn_pet--types">
                        <label for="">Pet Types:</label>
                        <select name="petType_id" id="">
                            <?php
                            foreach ($result as $key => $Value) :
                            ?>
                                <option value="<?php echo $Value->id ?>"><?php echo $Value->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <label for="">Race:</label>
                    <input type="text" name="raza">
                    <div class="btn_create">
                        <input type="submit" value="CreateRace" name="btn_create">
                    </div>
                </form>
            </div>
        </div>
        <table class="display">
            <?php
            $NameR = new Raza_controller();
            $NameT = new PetType_controller();
            ?>
            <thead class="column_name">
                <tr>
                    <th class="space_text">Name</th>
                    <th class="space_text">Amount</th>
                </tr>
            </thead>
            <tbody class="values">
                <tr>
                    <?php
                    $option = (new PetType_controller())->read();
                    foreach ($option as $key => $value) :
                    ?>
                        <td><?php echo $value->name ?></td><br>
                    <?php endforeach ?>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>