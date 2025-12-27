<?php
include 'config.php';

$id = $_GET['id'];

// Fetch existing data
$query = mysqli_query($conn, "SELECT * FROM cars WHERE id = $id");
$car = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Edit Car Details</h3>

<form method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label>Car Name</label>
        <input type="text" name="name" value="<?php echo $car['name']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Car Price</label>
        <input type="text" name="price" value="<?php echo $car['price']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Change Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button name="update" class="btn btn-success">Update</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

<?php
if (isset($_POST['update'])) {

    $name  = $_POST['name'];
    $price = $_POST['price'];

    if (!empty($_FILES['image']['name'])) {
        $imgName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmpName, "assets/uploads/cars/$imgName");

        mysqli_query($conn, "
            UPDATE cars 
            SET name='$name', price='$price', image='$imgName'
            WHERE id=$id
        ");
    } else {
        mysqli_query($conn, "
            UPDATE cars 
            SET name='$name', price='$price'
            WHERE id=$id
        ");
    }

    header("Location: index.php");
}
?>

</body>
</html>
