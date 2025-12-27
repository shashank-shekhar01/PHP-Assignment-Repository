<?php
include 'config.php';

$about_title = mysqli_real_escape_string($conn, $_POST['about_title']);
$about_text = mysqli_real_escape_string($conn, $_POST['about_text']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);

mysqli_query($conn, "
    UPDATE footer_settings SET
        about_title='$about_title',
        about_text='$about_text',
        email='$email',
        phone='$phone'
    WHERE id=1
");

header("Location: index.php");
exit;
