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

$sql = "SELECT * FROM search_records";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Stored Search Results</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Search Type</th>
                <th>Keyword</th>
                <th>Downloadable</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["searchType"]. "</td>
                <td>" . $row["keyword"]. "</td>
                <td>" . ($row["download"] ? 'Yes' : 'No'). "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>

<br><br>
<a href="index.html">Back to Search</a>
