<?php
include 'connectDB.php';

$query = "SELECT AVG(cost) AS avgRent FROM rentalProperty WHERE rentalID IN (SELECT rentalID FROM house)";
$house = $db->prepare($query);
$house->execute();
$avgRentHouse = $house->fetch(PDO::FETCH_ASSOC)['avgRent'];

$query = "SELECT AVG(cost) AS avgRent FROM rentalProperty WHERE rentalID IN (SELECT rentalID FROM apartment)";
$apartment = $db->prepare($query);
$apartment->execute();
$avgRentApartment = $apartment->fetch(PDO::FETCH_ASSOC)['avgRent'];

$query = "SELECT AVG(cost) AS avgRent FROM rentalProperty WHERE rentalID IN (SELECT rentalID FROM room)";
$room = $db->prepare($query);
$room->execute();
$avgRentRoom = $room->fetch(PDO::FETCH_ASSOC)['avgRent'];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1><a href="rental.html" class="removeLink">Rental Database</a></h1>
    </header>
    <nav>
        <ul>
            <li><a href="properties.php">List Property ID, Owner Name, and Manager Name</a></li>
            <li><a href="rentalGroupsCover.php">List Rental Group Information</a></li>
            <li><a href="rentalGroupPreferences.php">Update Rental Group Preferences</a></li>
            <li><a class="active" href="averageRent.php">Average Monthly Rent</a></li>
        </ul>
    </nav>
    
    <h2>Average Monthly Rent</h2>
    <table border='1' align='center'>
        <tr>
            <th>Type of Accommodation</th>
            <th>Average Monthly Rent</th>
        </tr>
        <tr>
            <td>House</td>
            <td><?php echo number_format($avgRentHouse, 2); ?></td>
        </tr>
        <tr>
            <td>Apartment</td>
            <td><?php echo number_format($avgRentApartment, 2); ?></td>
        </tr>
        <tr>
            <td>Room</td>
            <td><?php echo number_format($avgRentRoom, 2); ?></td>
        </tr>
    </table>
</body>
</html>