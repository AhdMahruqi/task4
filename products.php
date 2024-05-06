<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = ""; // If you have set a password, replace this with your actual password
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
    $product = $_POST["product"];
    $number_of_kits = $_POST["number_of_kits"];

    // Insert data into products table
    $sql = "INSERT INTO products (name, email, product, number_of_kits) 
            VALUES ('$name', '$email', '$product', '$number_of_kits')";

    if ($conn->query($sql) === TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

