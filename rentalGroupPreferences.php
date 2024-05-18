<!DOCTYPE html>
<head>
    <title>Update Preferences</title>
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
            <li><a class="active" href="rentalGroupPreferences.php">Update Rental Group Preferences</a></li>
            <li><a href="averageRent.php">Average Monthly Rent</a></li>
        </ul>
    </nav>

    <h2>Update Preferences</h2>
    <form method="post" action="updatePreferences.php">
        <label for="rentalGroupID">Rental Group ID:</label>
        <input type="text" id="rentalGroupID" name="rentalGroupID" required><br><br>

        <label for="typeOfAccommodation">Type of Accommodation:</label>
        <input type="text" id="typeOfAccommodation" name="typeOfAccommodation"><br><br>

        <label for="numBedrooms">Number of Bedrooms:</label>
        <input type="number" id="numBedrooms" name="numBedrooms"><br><br>

        <label for="numBathrooms">Number of Bathrooms:</label>
        <input type="number" id="numBathrooms" name="numBathrooms"><br><br>

        <label for="cost">Cost:</label>
        <input type="number" id="cost" name="cost" step="0.01"><br><br>

        <label for="laundry">Laundry:</label>
        <input type="text" id="laundry" name="laundry"><br><br>

        <label for="accessibility">Accessibility:</label>
        <input type="text" id="accessibility" name="accessibility"><br><br>

        <label for="parking">Parking:</label>
        <input type="text" id="parking" name="parking"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>