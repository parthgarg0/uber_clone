<?php
session_start();

// Fetch values from session
$Uname = $_SESSION['name'];
$Uemail = $_SESSION['email'];
$Upass = $_SESSION['password'];

// Connect to MySQL (adjust port if needed)
$connection = mysqli_connect("localhost", "root", "", "signup", 3308);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// If your users table has 3 columns (e.g., name, email, password), update the query
$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$prepared = $connection->prepare($sql);

// Check for preparation errors
if (!$prepared) {
    die("Prepare failed: " . $connection->error);
}

// Bind parameters (3 strings: s, s, s)
$prepared->bind_param("sss", $Uname, $Uemail, $Upass);

// Execute the query
if ($prepared->execute()) {
    echo "Insertion success!";
} else {
    echo "Insertion failed: " . $prepared->error;
}
// echo "Insertion sucess";
// echo $Uname;
// echo$Upass;
// echo$Uemail;
// Cleanup
$prepared->close();
$connection->close();
?>
