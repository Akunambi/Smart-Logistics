<?php
// Database connection parameters

session_start();
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

$uname = $_POST['uname'];
$email = $_POST['email'];
$phone=$_POST['phone'];
    $rol=$_POST['rol'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pass = $_POST['password'];
// Insert data into the database
$sql = "INSERT INTO users (fname, lname, uname, email, phone, role, password) VALUES ('$fname', '$email', '$uname', '$email', '$phone', '$rol', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// // Close the database connection
$conn->close();

?>
