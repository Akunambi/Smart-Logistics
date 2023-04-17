<?php
// Start session
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

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}


// Get username from session
$username = $_SESSION["username"];
$fetch="select * from users";
$fetched = $conn->query($fetch);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script>
        function openForm() {
            document.getElementById("overlay").style.display = "block";
            document.getElementById("popupForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("overlay").style.display = "none";
            document.getElementById("popupForm").style.display = "none";
        }
        function openForm2() {
            document.getElementById("overlay").style.display = "block";
            document.getElementById("popupForm").style.display = "block";
        }

        function closeForm2() {
            document.getElementById("overlay").style.display = "none";
            document.getElementById("popupForm").style.display = "none";
        }
    </script>
    <style>
        /* Style for popup form */
        .popup-form {
            display: none;
            /* Add any styles for the popup form */
        }

        /* Style for overlay */
        .overlay {
            display: none;
            /* Add any styles for the overlay */
        }
        /* Style for popup form */
        .popup-form2 {
            display: none;
            /* Add any styles for the popup form */
        }

        /* Style for overlay */
        .overlay2 {
            display: none;
            /* Add any styles for the overlay */
        }
    </style>
</head>
<body>
<p><a href="logout.php">Logout</a></p>
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <p>This is your dashboard.</p>
    <div>
<button onclick="openForm()">Add User</button>

<div class="overlay" id="overlay"></div>
<div class="popup-form" id="popupForm">
    <h2>Create new user</h2>
    <form action="register.php" method="post">

       First Name: <input type="text" name="fname"><br>
       Last Name: <input type="text" name="lname"><br>
       User Name: <input type="text" name="uname"><br>
       Role: <input type="text" name="rol"><br>
       Email: <input type="text" name="email"><br>
       Phone Number: <input type="text" name="phone"><br>
       Password: <input type="password" name="password"><br>
        <input type="submit" value="Add">

    </form>
    <button onclick="closeForm()">Close</button>
</div>
</div>
    <h1>users info</h1>
    <div>
    <?php
    if ($fetched->num_rows > 0) {
        echo "<table border=2>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Username</th>";
        echo "<th>Phone Number</th>";
        echo "<th>Role</th>";
        echo "<th>Email</th>";

        // Add more column headers as needed
        echo "</tr>";
    
    while($row = $fetched->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["fname"] ." " . $row["lname"] . "</td>";
        echo "<td>" . $row["uname"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo  "<td><button onclick='openForm()'> Edit </button></td>";
        // Add more columns as needed
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No rows found.";
}



// Check if rows were returned


// Close the database connection
$mysqli->close();
?>
</div>
<div class="overlay2" id="overlay2"></div>
<div class="popup-form2" id="popupForm"2>
    <h2>Edit user info</h2>
    <form action="edit.php" method="post">
       First Name: <input type="text" name="fname"><br>
       Last Name: <input type="text" name="lname"><br>
       User Name: <input type="text" name="uname"><br>
       Role: <input type="text" name="rol"><br>
       Email: <input type="text" name="email"><br>
       Phone Number: <input type="text" name="phone"><br>
       Password: <input type="password" name="password"><br>
        <input type="submit" value="Add">

    </form>
    <button onclick="closeForm2()">Close</button>
</div>
</div>



</body>
</html>
