<?php 



class Connection{
    public static function connect() {
        $mysqli = new mysqli($_ENV['SERVER'], $_ENV['USER'], $_ENV['PASS'], $_ENV['DATABASE'], $_ENV['PORT'],);
        if ($mysqli->connect_error) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        return $mysqli;
    }
}
?>