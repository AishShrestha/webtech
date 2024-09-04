<?php

$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'practice1';

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Corrected SQL query
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "Results: <br>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "First Name: {$row['firstName']}<br>";
            echo "Last Name: {$row['lastName']}<br>";
            echo "Gender: {$row['gender']}<br>";
            echo "Country: {$row['country']}<br>";
            echo "Colours: {$row['colours']}<br><br>";
        }
    } else {
        echo "No results found.";
    }
} else {
    echo "Error executing query: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
