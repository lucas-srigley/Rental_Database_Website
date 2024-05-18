<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=rentalDB', "root", "");
} catch (PDOException $e) {
    echo "Error!: ". $e->getMessage(). "<br/>";
    die();
}
?>