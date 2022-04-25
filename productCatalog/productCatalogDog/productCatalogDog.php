<?php

include "../../include/connection.php";
$query = "SELECT * FROM product WHERE animalType = 'Dog' AND prodType = 'Foods'";
$sql = mysqli_query($conn, $query);

$query2 = "SELECT * FROM product WHERE animalType = 'Dog' AND prodType = 'Shampoo'";
$sql2 = mysqli_query($conn, $query2);

$query3 = "SELECT * FROM product WHERE animalType = 'Dog' AND prodType = 'Accessories'";
$sql3 = mysqli_query($conn, $query3);

$query4 = "SELECT * FROM product WHERE animalType = 'Dog' AND prodType = 'Medicine'";
$sql4 = mysqli_query($conn, $query4);

$query5 = "SELECT * FROM product WHERE animalType = 'Dog' AND prodType != 'Foods' AND prodType != 'Shampoo' AND prodType != 'Accessories' AND prodType != 'Medicine'";
$sql5 = mysqli_query($conn, $query5);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <title>Product Catalog Dog - Tokotoki</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-4 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">ABOUT US</a></li>
                            <li><a class="dropdown-item" href="../productCatalog.php">OUR PRODUCTS</a></li>
                            <li><a class="dropdown-item" href="#">TRACK MY ORDER</a></li>
                            <li><a class="dropdown-item" href="#">ORDER HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">HELP CENTER</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img src="../../images/tokoTokiLogo1.png" width="50px" height="50px"></li>
                            <div style="position: fixed;width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="../../images/hang1.png">
                            </div>

                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="me-5 ms-5">
                        <a href="../../index.php"><img src="../../images/logo1.png" alt="logo" height="50px"></a>
                    </div>
                    <div class="flex-grow-1 me-5 ms-5">
                        <div class="d-flex" style="max-height: 35px;">
                            <input class="form-control me-2 search-input" type="search">
                            <div class="search-button">
                                <span class="material-icons-outlined">
                                    search
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="nav-button me-1">
                            <a class="" href="#">
                                <span class="material-icons-outlined">
                                    perm_identity
                                </span>
                            </a>
                        </div>
                        <div class="nav-button me-1">
                            <a class="" href="#">
                                <span class="material-icons-outlined">
                                    mail
                                </span>
                            </a>
                        </div>
                        <div class="nav-button me-1">
                            <a class="" href="#">
                                <span class="material-icons-outlined">
                                    notifications
                                </span>
                            </a>
                        </div>
                    </div>
                    <div style="width: 20%" class="row">
                        <div class="col-6" style="border-right: 1px solid #E3E3E3;">
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="nav-link" href="#" style="color: #E3E3E3;">SIGN UP</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="nav-link" href="#" style="color: #E3E3E3;">LOG IN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <div class="nav-bar d-flex">
            <div class="pet-type d-flex align-items-center justify-content-end">
                <img src="../../images/dog circle.png" alt="">
                <img src="../../images/dog teks.png" alt="">
            </div>
            <div class="line"></div>
            <div class="types">
                <img src="../../images/cat circle.png" onclick="location.href='../productCatalogCat/productCatalogCat.php'" style="cursor: pointer">
                <img src="../../images/rabbit circle.png" onclick="location.href='../productCatalogRabbit/productCatalogRabbit.php'" style="cursor: pointer">
                <img src="../../images/fish circle.png" onclick="location.href='../productCatalogFish/productCatalogFish.php'" style="cursor: pointer">
            </div>
        </div>

        <div class="categories">
            <div class="category">
                <img class="category-name" src="../../images/foods category.png">
                <div class="slideshow-container">
                    <div class="nav-btn">
                        <button class="prev" onclick="plusSlides(-1, 'foods')">
                            <img src="../../images/icons8-back-64.png" style="width: 50px; height: 60px;">
                        </button>
                    </div>

                    <div id="foods" class="slides">
                        <?php while ($data = mysqli_fetch_array($sql)) { ?>
                            <div class="slide" onclick="location.href='productDetail/productDetail.php?id=<?= $data['productID'] ?>'" style="cursor: pointer">
                                <div class="product-photo">
                                    <img class="type-pet" src="../../images/product/<?= $data['image'] ?>">
                                </div>
                                <div class="type-name d-flex justify-content-center">
                                    <?= $data['productName'] ?>
                                </div>
                                <div class="price">
                                    Rp.<?= number_format($data['price']) ?>
                                </div>
                            </div>
                        <?php } ?>

                        
                    </div>

                    <div class="nav-btn">
                        <button class="next" onclick="plusSlides(1, 'foods')">
                            <img src="../../images/icons8-forward-64.png" style="width: 50px; height: 60px;">
                        </button>
                    </div>
                </div>
            </div>

            <div class="category">
                <img class="category-name" src="../../images/shampoo category.png">
                <div class="slideshow-container">
                    <div class="nav-btn">
                        <button class="prev" onclick="plusSlides(-1, 'shampoo')">
                            <img src="../../images/icons8-back-64.png" style="width: 50px; height: 60px;">
                        </button>
                    </div>

                    <div id="shampoo" class="slides">
                        <?php while ($data = mysqli_fetch_array($sql2)) { ?>
                            <div class="slide" onclick="location.href='productDetail/productDetail.php?id=<?= $data['productID'] ?>'" style="cursor: pointer">
                                <div class="product-photo">
                                    <img class="type-pet" src="../../images/product/<?= $data['image'] ?>">
                                </div>
                                <div class="type-name d-flex justify-content-center">
                                    <?= $data['productName'] ?>
                                </div>
                                <div class="price">
                                    Rp.<?= number_format($data['price']) ?>
                                </div>
                            </div>
                        <?php } ?>
                        
                    </div>

                    <div class="nav-btn">
                        <button class="next" onclick="plusSlides(1, 'shampoo')">
                            <img src="../../images/icons8-forward-64.png" style="width: 50px; height: 60px;">
                        </button>
                    </div>
                </div>
            </div>

            <div class="category">
                <img class="category-name" src="../../images/accessories category.png" alt="">
                <div class="slideshow-container">
                    <div class="nav-btn">
                        <button class="prev" onclick="plusSlides(-1, 'accessories')">
                            <img src="../../images/icons8-back-64.png" style="width: 50px; height: 60px;">
                        </button>
                    </div>
                    <div id="accessories" class="slides">
                        <?php while ($data = mysqli_fetch_array($sql3)) { ?>
                            <div class="slide" onclick="location.href='productDetail/productDetail.php?id=<?= $data['productID'] ?>'" style="cursor: pointer">
                                <div class="product-photo">
                                    <img class="type-pet" src="../../images/product/<?= $data['image'] ?>">
                                </div>
                                <div class="type-name d-flex justify-content-center">
                                    <?= $data['productName'] ?>
                                </div>
                                <div class="price">
                                    Rp.<?= number_format($data['price']) ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="nav-btn">
                        <button class="next" onclick="plusSlides(1, 'accessories')">
                            <img src="../../images/icons8-forward-64.png" style="width: 50px; height: 60px;">
                        </button>
                    </div>
                </div>
            </div>

            <div class="category">
                <img class="category-name" src="../../images/medicine category.png" alt="">
                <div class="slideshow-container">
                    <div class="nav-btn">
                        <button class="prev" onclick="plusSlides(-1, 'medicine')">
                            <img src="../../images/icons8-back-64.png" style="width: 50px; height: 60px;">
                        </button>
                    </div>
                    <div id="medicine" class="slides">
                        <?php while ($data = mysqli_fetch_array($sql4)) { ?>
                            <div class="slide" onclick="location.href='productDetail/productDetail.php?id=<?= $data['productID'] ?>'" style="cursor: pointer">
                                <div class="product-photo">
                                    <img class="type-pet" src="../../images/product/<?= $data['image'] ?>">
                                </div>
                                <div class="type-name d-flex justify-content-center">
                                    <?= $data['productName'] ?>
                                </div>
                                <div class="price">
                                    Rp.<?= number_format($data['price']) ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="nav-btn">
                        <button class="next" onclick="plusSlides(1, 'medicine')">
                            <img src="../../images/icons8-forward-64.png" style="width: 50px; height: 60px;">
                        </button>
                    </div>
                </div>
            </div>

            <div class="category">
                <img class="category-name" src="../../images/others category.png" alt="">
                <div class="slideshow-container">
                    <div class="nav-btn">
                        <button class="prev" onclick="plusSlides(-1, 'others')">
                            <img src="../../images/icons8-back-64.png" style="width: 50px; height: 60px;">
                        </button>
                    </div>
                    <div id="others" class="slides">
                        <?php while ($data = mysqli_fetch_array($sql5)) { ?>
                            <a href="productDetail/productDetail.php?id=<?= $data['productID'] ?>" class="slide" style="cursor: pointer; text-decoration: none">
                                <div class="product-photo">
                                    <img class="type-pet" src="../../images/product/<?= $data['image'] ?>">
                                </div>
                                <div class="type-name d-flex justify-content-center">
                                    <?= $data['productName'] ?>
                                </div>
                                <div class="price">
                                    Rp.<?= number_format($data['price']) ?>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="nav-btn">
                        <button class="next" onclick="plusSlides(1, 'others')">
                            <img src="../../images/icons8-forward-64.png" style="width: 50px; height: 60px;">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="col">
            <p style="text-align: center;margin:0">
                Recalls | Terms of use | Privacy Policy | Interest-Based-Ads | CA Supply Chain Act | Do Not Sell My
                Personal Information
            </p>
        </div>
        <div class="cart">
            <a href="#"><img class="cart" src="../../images/my cart.png" alt=""></a>
        </div>
    </div>

    <script src="slider.js"></script>

</body>

</html>