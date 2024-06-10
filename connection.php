<?php
// Database connection settings
$servername = "localhost";
$username = "id19438440_ayanphotography2000";
$password = "Ayan@2000@database";
$dbname = "id19438440_ayanphotography";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
