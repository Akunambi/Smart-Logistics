<?php
// Database connection parameters
$servername = "localhost"; // or the IP address of your MySQL server
$username = "root"; // MySQL username
$password = ""; // MySQL password (leave blank for default XAMPP installation)
$dbname = "Smart_Logistics"; // Name of the database you want to connect to

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform database operations here...

// Close the connection
$conn->close();
?>
