<?php
include 'config.php';

/* ----------- LOGO UPLOAD -------- */
if (isset($_POST['upload_logo'])) {

    $imgName = $_FILES['logo']['name'];
    $tmpName = $_FILES['logo']['tmp_name'];

    move_uploaded_file($tmpName, "assets/uploads/logo/$imgName");

    mysqli_query($conn, "INSERT INTO logo(image) VALUES('$imgName')");

    header("Location: index.php");
    exit;
}


/* ------- HERO IMAGE UPLOAD -------- */
if (isset($_POST['upload_hero'])) {

    $imgName = $_FILES['hero']['name'];
    $tmpName = $_FILES['hero']['tmp_name'];

    move_uploaded_file($tmpName, "assets/uploads/hero/$imgName");

    mysqli_query($conn, "INSERT INTO hero_image(image) VALUES('$imgName')");

    header("Location: index.php");
    exit;
}


/* ------- CAR IMAGE UPLOAD ------- */
if (isset($_POST['upload_car'])) {

    $name    = $_POST['name'];
    $price   = $_POST['price'];
    $section = $_POST['section']; 

    $imgName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmpName, "assets/uploads/cars/$imgName");

    mysqli_query($conn, "
        INSERT INTO cars(name, price, image, section)
        VALUES('$name', '$price', '$imgName', '$section')
    ");

    header("Location: index.php");
    exit;
}
?>
