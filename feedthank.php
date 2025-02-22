<?php
// Database credentials
$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "feedback_db"; // Your database name

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
    $email = $_POST['email'];
    $date = $_POST['date'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Insert form data into the database
    $sql = "INSERT INTO feedback (name, email, date, role, phone, message)
            VALUES ('$name', '$email', '$date', '$role', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully. <a href='feedthank.html'>Click here</a> to go to the thank you page.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
