<?php
// Step 1: Define a PHP Class for Questionnaire
class Questionnaire {
    public $name;
    public $email;
    public $age;
    public $gender;
    public $feedback;

    // Constructor
    public function __construct($name, $email, $age, $gender, $feedback) {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
        $this->gender = $gender;
        $this->feedback = $feedback;
    }
}

// Step 2: Connect to your database
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "biotech";

$conn = new mysqli($servername, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Retrieve data from the database
$sql = "SELECT name, email, age, gender, feedback FROM questionnaire_responses";
$result = $conn->query($sql);

$questionnaireSubmissions = array();

if ($result->num_rows > 0) {
    // Create objects for each row in the result set
    while($row = $result->fetch_assoc()) {
        $submission = new Questionnaire($row["name"], $row["email"], $row["age"], $row["gender"], $row["feedback"]);
        $questionnaireSubmissions[] = $submission;
    }
} else {
    echo "0 results";
}

// Step 4: Display the questionnaire submissions
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Email</th><th>Age</th><th>Gender</th><th>Feedback</th></tr>";

foreach ($questionnaireSubmissions as $submission) {
    echo "<tr>";
    echo "<td>" . $submission->name . "</td>";
    echo "<td>" . $submission->email . "</td>";
    echo "<td>" . $submission->age . "</td>";
    echo "<td>" . $submission->gender . "</td>";
    echo "<td>" . $submission->feedback . "</td>";
    echo "</tr>";
}

echo "</table>";

// Step 5: Close the database connection
$conn->close();
?>
