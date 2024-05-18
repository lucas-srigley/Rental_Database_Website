<?php
include 'connectDB.php';

$query = "SELECT rp.rentalID, 
                    CONCAT(pOwner.fname, ' ', pOwner.lname) AS ownerName, 
                    CONCAT(pManager.fname, ' ', pManager.lname) AS managerName
            FROM rentalProperty rp
            INNER JOIN person pOwner ON rp.ownerID = pOwner.ID
            LEFT JOIN person pManager ON rp.managerID = pManager.ID";

$stmt = $db->prepare($query);
$stmt->execute();
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <li><a class="active" href="properties.php">List Property ID, Owner Name, and Manager Name</a></li>
            <li><a href="rentalGroupsCover.php">List Rental Group Information</a></li>
            <li><a href="rentalGroupPreferences.php">Update Rental Group Preferences</a></li>
            <li><a href="averageRent.php">Average Monthly Rent</a></li>
        </ul>
    </nav>

    <h2>Property ID, Owner Name, Manager Name</h2>
    <table border='1' align='center'>
        <tr>
            <th>Property ID</th>
            <th>Owner Name</th>
            <th>Manager Name</th>
        </tr>
        <?php foreach ($properties as $property): ?>
            <tr>
                <td><?php echo $property['rentalID']; ?></td>
                <td><?php echo $property['ownerName']; ?></td>
                <td><?php echo $property['managerName']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>