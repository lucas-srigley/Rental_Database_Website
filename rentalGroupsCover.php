<?php
include 'connectDB.php';

$query = "SELECT * FROM rentalGroup";
$stmt = $db->prepare($query);
$stmt->execute();
$groups = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    <h2>Choose Rental Group</h2>
    <?php foreach ($groups as $group): ?>
        <li><a href='rentalGroupDetails.php?id=<?php echo $group['rentalGroupID']; ?>' class='removeLink'>Group ID: <?php echo $group['rentalGroupID']; ?></a></li>
    <?php endforeach; ?>
</body>
</html>