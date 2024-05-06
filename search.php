<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "biotech";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission and construct SQL query
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_term = $_POST["search_term"];

    // Construct SQL query
    $sql = "SELECT * FROM products WHERE name LIKE '%$search_term%'";

    // Execute SQL query
    $result = $conn->query($sql);

    // Display matching records in a table format
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Column 1</th><th>Column 2</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["column1"] . "</td><td>" . $row["column2"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No matching records found.";
    }
}
$conn->close();
?>

