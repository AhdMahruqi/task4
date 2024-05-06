<?php
// Step 1: Establish connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "biotech";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $product = $_POST["product"];
    $numberOfKits = $_POST["numberOfKits"];

    // Insert data into database
    $sql = "INSERT INTO products (name, email, product, numberOfKits) 
            VALUES ('$name', '$email', '$product', '$numberOfKits')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
