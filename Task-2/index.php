<?php
include 'config.php';

$footer = mysqli_query($conn, "SELECT * FROM footer_settings WHERE id=1");
$footerData = mysqli_fetch_assoc($footer);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardekho Website</title>

    <link rel="stylesheet" href="website.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="cardekho-container">
    <nav class="cardekho-navbar">
        <ul>
            <li class="logo">
                <?php
                $logo = mysqli_query($conn, "SELECT * FROM logo ORDER BY id DESC LIMIT 1");
                if ($row = mysqli_fetch_assoc($logo)) {
                    echo "<img src='assets/uploads/logo/{$row['image']}' height='58' width='178'>";
                } else {
                    echo "Upload your logo";
                }
                ?>
            </li>
            
            <li class="searchbar">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.9536 14.9458L21 21M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="#393838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                <input type="text" placeholder="Search or Ask a Question">
            </li>
            
            <li class="login">Login/Register</li>
        </ul>
    </nav>
    
    <!-- LOGO UPLOAD -->
     <div class="container mt-2">
        <div class="row">
            <div class="col-lg-6">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="logo" required>
                    <button name="upload_logo" class="btn btn-primary btn-sm">Upload Logo</button>
                </form>
            </div>
            
            <div class="col-lg-6">
                <form action="delete.php" method="GET" onsubmit="return confirm('Delete logo?');">
                    <input type="hidden" name="type" value="logo">
                    <button class="btn btn-danger btn-sm mt-1">Delete Logo</button>
                </form>
            </div>
        </div>
    </div>
    
    
    <div class="lower-section">

        <!---------------------------------- HERO SECTION ------------------------------->
        <div class="hero-section">
            <div class="row">
                <div class="col-lg-3">
                    <div class="button-section">
                        <div class="row">
                            <div class="col-12">
                                <form action="upload.php" method="POST" enctype="multipart/form-data">
                                    <input type="file" name="hero" required class="form-control mb-2">
                                    <button name="upload_hero" class="btn btn-success w-100">Upload Hero Image</button>
                                </form>
                            </div>
                            
                            <div class="col-12">
                                <form action="delete.php" method="GET" onsubmit="return confirm('Delete hero image?');">
                                    <input type="hidden" name="type" value="hero">
                                    <button class="btn btn-danger w-100 mt-2">Delete Hero Image</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-9">
                    <div class="image-section d-flex align-items-center justify-content-center">
                        <?php
                        $hero = mysqli_query($conn, "SELECT * FROM hero_image ORDER BY id DESC LIMIT 1");
                        if ($row = mysqli_fetch_assoc($hero)) {
                            echo "<img src='assets/uploads/hero/{$row['image']}' width='100%' height='100%'>";
                        } else {
                            echo "No Image is there, Please upload an Image";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!------------------------------------- MOST SEARCHED CARS --------------------------------------->
        
        <div class="most-search-cards">
            <div class="search-header">The most searched cars</div>
            
            <div class="search-body">
                <div class="row">
                    <?php
                    $cars = mysqli_query($conn, "SELECT * FROM cars WHERE section='most_search'");
                    while ($car = mysqli_fetch_assoc($cars)) {
                    ?>
                    <div class="col-lg-3 col-md-6 col-12 mb-3">
                        <div class="search-card">
                            <div class="most-search-image">
                                <?php
                                if ($car['image']) {
                                    echo "<img src='assets/uploads/cars/{$car['image']}' width='100%' height='100%'>";
                                } else {
                                    echo "No image";
                                }
                                ?>
                            </div>
                            
                            <div class="most-search-details">
                                <div class="car-name"><?= $car['name'] ?></div>
                                <div class="car-price"><?= $car['price'] ?></div>
                                
                                <a href="edit_car.php?id=<?= $car['id'] ?>" class="btn btn-primary btn-sm mt-2">Edit Details</a>
                                
                                <a href="delete.php?car_id=<?= $car['id'] ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Delete this car?');">Delete</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <!------------------------ ADD MOST SEARCH CAR -------------------------->
        <div class="container mt-3">
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="section" value="most_search">
                
                <input type="text" name="name" placeholder="Car Name" required class="form-control mb-2">
                <input type="text" name="price" placeholder="Car Price" required class="form-control mb-2">
                <input type="file" name="image" required class="form-control mb-2">
                
                <button name="upload_car" class="btn btn-success">Add Most Search Car</button>
            </form>
        </div>
        
        
        <!--------------------------------- LATEST CARS ----------------------------------->
        <div class="latest-cars-cards mt-5">
            <div class="latest-header">Latest cars</div>

            <div class="latest-body">
                <div class="row">
                    
                    <?php
                    $cars = mysqli_query($conn, "SELECT * FROM cars WHERE section='latest'");
                    while ($car = mysqli_fetch_assoc($cars)) {
                    ?>
                    <div class="col-lg-3 col-md-6 col-12 mb-3">
                        <div class="latest-card">
                            <div class="latest-image">
                                <?php
                                if ($car['image']) {
                                    echo "<img src='assets/uploads/cars/{$car['image']}' width='100%' height='100%'>";
                                } else {
                                    echo "No image";
                                }
                                ?>
                            </div>
                            
                            <div class="latest-car-details">
                                <div class="car-name"><?= $car['name'] ?></div>
                                <div class="car-price"><?= $car['price'] ?></div>
                                
                                <a href="edit_car.php?id=<?= $car['id'] ?>" class="btn btn-primary btn-sm mt-2">Edit Details</a>
                                
                                <a href="delete.php?car_id=<?= $car['id'] ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Delete this car?');">Delete</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <!------------------------------ ADD LATEST CAR ------------------------>
        
        <div class="container mt-3 mb-5">
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="section" value="latest">
                
                <input type="text" name="name" placeholder="Car Name" required class="form-control mb-2">
                <input type="text" name="price" placeholder="Car Price" required class="form-control mb-2">
                <input type="file" name="image" required class="form-control mb-2">
                
                <button name="upload_car" class="btn btn-success">Add Latest Car</button>
            </form>
        </div>
    </div>

    <!----------------------- FOOTER ---------------------------->
        <!-- <footer class="cardekho-footer">
            <div class="container">
                <div class="row">
                     
                      <div class="col-lg-4 col-md-6 mb-4">
                        <h6>About CarDekho</h6>
                        <p>
                            Cardekho helps users research, compare and find the best cars
                            in India with trusted reviews, prices and latest updates.
                        </p>
                    </div>
                    
                    
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6>Quick Links</h6>
                        <ul>
                            <li><a href="#">New Cars</a></li>
                            <li><a href="#">Used Cars</a></li>
                            <li><a href="#">Car Prices</a></li>
                            <li><a href="#">Compare Cars</a></li>
                        </ul>
                    </div>
                    
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h6>Popular Cars</h6>
                        <ul>
                            <li><a href="#">Tata Nexon</a></li>
                            <li><a href="#">Hyundai Creta</a></li>
                            <li><a href="#">Maruti Brezza</a></li>
                            <li><a href="#">Mahindra Thar</a></li>
                        </ul>
                    </div>
                    
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h6>Connect with us</h6>
                        <p>Email: support@cardekho.com</p>
                        <p>Phone: +91 99999 99999</p>
                        
                        <div class="footer-social">
                            <a href="#">Facebook</a>
                            <a href="#">Twitter</a>
                            <a href="#">Instagram</a>
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <div class="footer-bottom">
                    © <?php echo date('Y'); ?> Cardekho. All Rights Reserved.
                </div>
            </div>
        </footer> -->

        <footer class="cardekho-footer">
            <div class="container">
                
                <div class="text-end mb-2">
                    <button class="btn btn-sm btn-outline-light" onclick="enableFooterEdit()">
                        ✏ Edit Footer
                    </button>
                </div>
                
                <form method="POST" action="edit_footer.php" id="footerForm">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <h6>
                                <span class="view-mode"><?= $footerData['about_title']; ?></span>
                                <input type="text" name="about_title"
                                value="<?= $footerData['about_title']; ?>"
                                class="form-control edit-mode d-none">
                            </h6>
                            
                            <p>
                                <span class="view-mode"><?= $footerData['about_text']; ?></span>
                                <textarea name="about_text"
                                class="form-control edit-mode d-none"
                                rows="4"><?= $footerData['about_text']; ?></textarea>
                            </p>
                        </div>
                        
                        <div class="col-lg-2 col-md-6 mb-4">
                            <h6>Quick Links</h6>
                            <ul>
                                <li><a href="#">New Cars</a></li>
                                <li><a href="#">Used Cars</a></li>
                                <li><a href="#">Car Prices</a></li>
                                <li><a href="#">Compare Cars</a></li>
                            </ul>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-4">
                            <h6>Popular Cars</h6>
                            <ul>
                                <li><a href="#">Tata Nexon</a></li>
                                <li><a href="#">Hyundai Creta</a></li>
                                <li><a href="#">Maruti Brezza</a></li>
                                <li><a href="#">Mahindra Thar</a></li>
                            </ul>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-4">
                            <h6>Connect with us</h6>
                            
                            <p>
                                <span class="view-mode">Email: <?= $footerData['email']; ?></span>
                                <input type="email" name="email"
                                value="<?= $footerData['email']; ?>"
                               class="form-control edit-mode d-none">
                            </p>
                            
                            <p>
                                <span class="view-mode">Phone: <?= $footerData['phone']; ?></span>
                                <input type="text" name="phone"
                                value="<?= $footerData['phone']; ?>"
                                class="form-control edit-mode d-none">
                            </p>
                        </div>
                    </div>
                    
                    <!-- SAVE / CANCEL -->
                    <div class="text-end edit-mode d-none">
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="cancelFooterEdit()">Cancel</button>
                    </div>
                </form>
                
                <hr>
                
                <div class="footer-bottom">
                    © <?= date('Y'); ?> Cardekho. All Rights Reserved.
                </div>
            </div>
        </footer>
        
        <script>
        function enableFooterEdit() {
            document.querySelectorAll('.view-mode').forEach(el => el.classList.add('d-none'));
            document.querySelectorAll('.edit-mode').forEach(el => el.classList.remove('d-none'));
        }
        
        function cancelFooterEdit() {
            location.reload();
            }
            
        </script>


</body>
</html>
