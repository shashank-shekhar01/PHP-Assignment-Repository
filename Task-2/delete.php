<?php
include 'config.php';

/* -------------------- DELETE LOGO ------------------------ */
if (isset($_GET['type']) && $_GET['type'] === 'logo') {

    $q = mysqli_query($conn, "SELECT * FROM logo ORDER BY id DESC LIMIT 1");
    if ($row = mysqli_fetch_assoc($q)) {

        $filePath = "assets/uploads/logo/" . $row['image'];

        if (!empty($row['image']) && file_exists($filePath)) {
            unlink($filePath);
        }

        // mysqli_query($conn, "DELETE FROM logo WHERE id=" . $row['id']);
    }

    mysqli_query($conn, "DELETE FROM logo");

    header("Location: index.php");
    exit;
}


/* --------------------- DELETE HERO ---------------------- */
if (isset($_GET['type']) && $_GET['type'] === 'hero') {

    $q = mysqli_query($conn, "SELECT * FROM hero_image ORDER BY id DESC LIMIT 1");
    if ($row = mysqli_fetch_assoc($q)) {

        $filePath = "assets/uploads/hero/" . $row['image'];

        if (!empty($row['image']) && file_exists($filePath)) {
            unlink($filePath);
        }

        // mysqli_query($conn, "DELETE FROM hero_image WHERE id=" . $row['id']);
    }

     mysqli_query($conn, "DELETE FROM hero_image");

    header("Location: index.php");
    exit;
}


/* ----------------------- DELETE CAR --------------------- */
if (isset($_GET['car_id'])) {

    $id = (int) $_GET['car_id'];

    $q = mysqli_query($conn, "SELECT image FROM cars WHERE id=$id");
    if ($row = mysqli_fetch_assoc($q)) {

        $filePath = "assets/uploads/cars/" . $row['image'];

        if (!empty($row['image']) && file_exists($filePath)) {
            unlink($filePath);
        }
    }

    mysqli_query($conn, "DELETE FROM cars WHERE id=$id");

    header("Location: index.php");
    exit;
}

?>