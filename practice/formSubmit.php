<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'krishma';

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
} else {
    echo "Connection established successfully<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    gender VARCHAR(255) NOT NULL,
    colours VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $country = $_POST['countries'];
    $gender = $_POST['gender'];
    $colours = $_POST['colour'];

    // Convert the array of colours into a comma-separated string
    $coloursString = implode(",", $colours);

    $insertQuery = "INSERT INTO users (firstName, lastName, country, gender, colours) 
                    VALUES ('$firstName', '$lastName', '$country', '$gender', '$coloursString')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<br><br>
<a href="./viewResults.php">View Stored Results</a>
