<?php
include 'connectDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rentalGroupID = $_POST["rentalGroupID"];
    $typeOfAccommodation = $_POST["typeOfAccommodation"];
    $numBedrooms = $_POST["numBedrooms"];
    $numBathrooms = $_POST["numBathrooms"];
    $cost = $_POST["cost"];
    $laundry = $_POST["laundry"];
    $accessibility = $_POST["accessibility"];
    $parking = $_POST["parking"];

    $stmt = $db->prepare("UPDATE rentalGroup 
                            SET typeOfAccommodation = ?, 
                            numBedrooms = ?, 
                            numBathrooms = ?, 
                            cost = ?, 
                            laundry = ?, 
                            accessibility = ?, 
                            parking = ? 
                            WHERE rentalGroupID = ?");

    $stmt->execute([$typeOfAccommodation, $numBedrooms, $numBathrooms, $cost, $laundry, $accessibility, $parking, $rentalGroupID]);
} else {
    header("Location: rentalGroupPreferences.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <header>
        <h1><a href='rental.html' class='removeLink'>Rental Database</a></h1>
    </header>
    <nav>
        <ul>
            <li><a href='properties.php'>List Property ID, Owner Name, and Manager Name</a></li>
            <li><a href='rentalGroupsCover.php'>List Rental Group Information</a></li>
            <li><a class='active' href='rentalGroupPreferences.php'>Update Rental Group Preferences</a></li>
            <li><a href='averageRent.php'>Average Monthly Rent</a></li>
        </ul>
    </nav>
    <h2>Preferences updated successfully!</h2>
</body>
</html>