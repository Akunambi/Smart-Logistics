<?php
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


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

     $query = "SELECT * FROM users WHERE uname = '$username' AND password = '$password'";
     $result = $conn->query($query);
 
     // Check if user exists
     if ($result->num_rows == 1) {
         $row = $result->fetch_assoc();
 
         // Start session and set session variables
         session_start();
         $_SESSION['user_id'] = $row['uid'];
         $_SESSION['username'] = $row['uname'];
         // Redirect to dashboard or any other page
         header("Location: dashboard.php");
         exit();
     } else {
         // Invalid username or password
         echo "Invalid username or password";
     }
    }
     $conn->close();
     ?>