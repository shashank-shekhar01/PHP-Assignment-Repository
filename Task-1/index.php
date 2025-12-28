<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        .global-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgb(168, 211, 211);
        }
        .form-container {
            background-color: white;
            padding: 15px 25px;
            /* height: 350px; */
            width: 380px;
            border: 1px solid rgb(162, 160, 160);
            border-radius: 10px;
        }
        .form-container h4 {
           font-weight: 400;
           margin-bottom: 30px;
           text-align: center;
           font-family: 'Lucida Sans', 'Lucida Sans Regular', sans-serif;
        }
        .form-container input {
            border-radius: 4px;
            border: 1px solid rgb(164, 162, 162);
            padding: 5px 10px;
        }
        .form-container input[type="submit"] {
            background-color: rgb(42, 72, 127);
            color: white;
            padding: 5px 15px;
        }
    </style>
</head>
<body>
    <div class="global-form-container">
        <div class="form-container">

        <?php
        session_start();
        
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success mb-3'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']);
        }
        ?>

        <h4>Registration Form</h4>

        <form id="regForm" action="save.php" method="POST">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="name">Name: </label>
                    <input type="text" name="username" placeholder="Enter your name..." required>
                </div>
                <div class="col-12 mb-3">
                    <label for="phone">Phone number: </label>
                    <input type="number" name="phone" placeholder="Enter your phone no." required>
                </div>
                <div class="col-12 mb-3">
                    <label for="email">Email id: </label>
                    <input type="email" name="email" placeholder="Enter your email..." required>
                </div>
                <div class="col-12 mb-3">
                    <label for="address">Address: </label>
                    <input type="text" name="address" placeholder="Enter your address..." required>
                </div>
                <div class="col-12 mb-3">
                    <strong>Select Car Type:</strong><br>

                    <input type="checkbox" name="car_type[]" value="Hatchback">
                    <label>Hatchback</label><br>

                    <input type="checkbox" name="car_type[]" value="Sedan">
                    <label>Sedan</label><br>

                    <input type="checkbox" name="car_type[]" value="SUV">
                    <label>SUV</label>
                </div>


                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
    </div>
</body>
</html>
