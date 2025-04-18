<?php
$host = "localhost";         // usually localhost
$username = "root";          // default XAMPP/WAMP username
$password = "";              // default is empty
$database = "softdev";  // name from your database.sql

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
