<?php
$host = "localhost:3307";
$user = "root";
$password = "your_database_password";
$dbname = "cardekho_db";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
