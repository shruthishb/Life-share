<?php
// Database credentials
$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "form_data"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $blood_group = $_POST['blood_group'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $district = $_POST['district'];

    // Insert the form data into the database
    $sql = "INSERT INTO users (name, age, phone1, phone2, gender, email, blood_group, country, state, district)
            VALUES ('$name', '$age', '$phone1', '$phone2', '$gender', '$email', '$blood_group', '$country', '$state', '$district')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully. <a href='thankyou.html'>Click here</a> to go to the thank you page.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
