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
} else {
  echo "Connected successfully";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["form_type"]) && !empty($_POST["form_type"])) {
        $form_type = $_POST["form_type"];
        
        switch ($form_type) {
            case "questionnaire":
                // Retrieve questionnaire form data
                $name = $_POST["name"];
                $email = $_POST["email"];
                $age = $_POST["age"];
                $gender = $_POST["gender"];
                $feedback = $_POST["feedback"];
                $agreement = isset($_POST["remember"]) ? 1 : 0;

                // Insert data into questionnaire_responses table
                $sql = "INSERT INTO questionnaire_responses (name, email, age, gender, feedback, agreement) 
                        VALUES ('$name', '$email', '$age', '$gender', '$feedback', '$agreement')";
                break;
                
            case "contactUs":
                // Retrieve contactUs form data
                $email = $_POST["email"];
                $subject = $_POST["subject"];
                $query = $_POST["query"];

                // Insert data into contactUs table
                $sql = "INSERT INTO contactUs (email, subject, query) 
                        VALUES ('$email', '$subject', '$query')";
                break;
                
            case "products":
                // Retrieve products form data
                $name = $_POST["name"];
                $email = $_POST["email"];
                $product = $_POST["product"];
                $number_of_kits = $_POST["number_of_kits"];

                // Insert data into products table
                $sql = "INSERT INTO products (name, email, product, number_of_kits) 
                        VALUES ('$name', '$email', '$product', '$number_of_kits')";
                break;
        }
        
        // Execute SQL query
        if ($conn->query($sql) === TRUE) {
            echo "New record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close database connection
$conn->close();
?>
