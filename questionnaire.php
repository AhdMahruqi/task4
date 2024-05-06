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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $feedback = $_POST["feedback"];

    // Insert data into questionnaire_responses table
    $sql = "INSERT INTO questionnaire_responses (name, email, age, gender, feedback) 
            VALUES ('$name', '$email', '$age', '$gender', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
