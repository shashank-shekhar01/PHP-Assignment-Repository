<?php 

session_start();

$conn = mysqli_connect("localhost:3307", "root", "your_database_password", "car_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name    = $_POST['username'];
$phone   = $_POST['phone'];
$email   = $_POST['email'];
$address = $_POST['address'];

if (!empty($_POST['car_type'])) {
    $car_types = implode(",", $_POST['car_type']);
} else {
    $car_types = "";
}

$sql = "INSERT INTO car_enquiry 
        (name, phone, email, address, car_types) 
        VALUES 
        ('$name', '$phone', '$email', '$address', '$car_types')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['success'] = "Form submitted successfully!";
    header("Location: form.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

?>