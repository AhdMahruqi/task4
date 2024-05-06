<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biotech";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $query = $_POST["query"];

    // Insert data into contactUs table
    $sql = "INSERT INTO contactUs (email, subject, query) VALUES ('$email', '$subject', '$query')";

    if ($conn->query($sql) === TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
