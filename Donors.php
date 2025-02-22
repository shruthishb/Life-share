<?php
// Database credentials
$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "donors_db"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $blood_group = $_POST['blood_group'];
    $type = $_POST['type'];
    $units = $_POST['units'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $district = $_POST['district'];

    // Insert the form data into the database
    $sql = "INSERT INTO donations (blood_group, type, units, country, state, district)
            VALUES ('$blood_group', '$type', '$units', '$country', '$state', '$district')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
