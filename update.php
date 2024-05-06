<?php
//connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "biotech";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); // Changed $database to $dbname

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Define the primary key or unique identifier of the record to update
$primaryKey = "1"; // change first record 

//Define new field values
$newName = "Ahd";
$newEmail = "Ahd@gmal.com";
$newProduct = "HIVdetectionkit";
$newNumberOfKits = "1-5 kits";

//Perform SQL query to update the record based on the primary key
$sql = "UPDATE products SET name = '$newName', email = '$newEmail', product = '$newProduct', number_of_kits = '$newNumberOfKits' WHERE name = '$primaryKey'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>