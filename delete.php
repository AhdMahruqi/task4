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

// Step 2: Handle form submission (if any)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the primary key or unique identifier from the form
    $primaryKey = $_POST["primaryKey"];

    // Perform SQL query to delete the record based on the primary key
    $sql = "DELETE FROM questionnaire_responses WHERE primary_key_column = '$primaryKey'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>