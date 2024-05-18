<?php
include 'connectDB.php';

$groupId = $_GET['id'];
$queryGroup = "SELECT * FROM rentalGroup WHERE rentalGroupID = :groupId";
$stmtGroup = $db->prepare($queryGroup);
$stmtGroup->bindParam(':groupId', $groupId);
$stmtGroup->execute();
$group = $stmtGroup->fetch(PDO::FETCH_ASSOC);

$queryPreferences = "SELECT p.fname, p.lname
                      FROM renter r
                      JOIN person p ON r.personID = p.ID
                      WHERE r.rentalGroupID = :groupId";

$stmtPreferences = $db->prepare($queryPreferences);
$stmtPreferences->bindParam(':groupId', $groupId);
$stmtPreferences->execute();
$preferences = $stmtPreferences->fetchAll(PDO::FETCH_ASSOC);
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
            <li><a class="active" href="rentalGroupsCover.php">List Rental Group Information</a></li>
            <li><a href="rentalGroupPreferences.php">Update Rental Group Preferences</a></li>
            <li><a href="averageRent.php">Average Monthly Rent</a></li>
        </ul>
    </nav>

    <h2>Student Names</h2>
    <table border="1" align="center">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php foreach ($preferences as $preference): ?>
            <tr>
                <td><?php echo $preference['fname']; ?></td>
                <td><?php echo $preference['lname']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Rental Group Details</h2>
    <table border="1" align="center">
        <tr>
            <th>Rental Group ID</th>
            <td><?php echo $group['rentalGroupID']; ?></td>
        </tr>
        <tr>
            <th>Type of Accommodation</th>
            <td><?php echo $group['typeOfAccommodation']; ?></td>
        </tr>
        <tr>
            <th>Number of Bedrooms</th>
            <td><?php echo $group['numBedrooms']; ?></td>
        </tr>
        <tr>
            <th>Number of Bathrooms</th>
            <td><?php echo $group['numBathrooms']; ?></td>
        </tr>
        <tr>
            <th>Cost</th>
            <td><?php echo $group['cost']; ?></td>
        </tr>
        <tr>
            <th>Laundry</th>
            <td><?php echo $group['laundry']; ?></td>
        </tr>
        <tr>
            <th>Accessibility</th>
            <td><?php echo $group['accessibility']; ?></td>
        </tr>
        <tr>
            <th>Parking</th>
            <td><?php echo $group['parking']; ?></td>
        </tr>
    </table>
</body>
</html>