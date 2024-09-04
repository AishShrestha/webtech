<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_catalog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS search_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    searchType VARCHAR(50) NOT NULL,
    keyword VARCHAR(255) NOT NULL,
    download BOOLEAN NOT NULL
)";
$conn->query($sql);

// Store data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchType = $conn->real_escape_string($_POST['searchType']);
    $keyword = $conn->real_escape_string($_POST['keyword']);
    $download = $_POST['download'] ? 1 : 0;

    $sql = "INSERT INTO search_records (searchType, keyword, download)
            VALUES ('$searchType', '$keyword', $download)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!-- Link to view results -->
<br><br>
<a href="view_results.php">View Stored Results</a>
