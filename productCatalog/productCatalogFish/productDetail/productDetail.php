<?php 

include "../../../include/connection.php";
$id = $_GET['id'];
$query = "SELECT * FROM product WHERE productID = $id";
$sql = mysqli_query($conn, $query);
$data = mysqli_fetch_array($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Creamy Treats Dog - Tokotoki</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <div class="navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-4 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">ABOUT US</a></li>
                            <li><a class="dropdown-item" href="../../productCatalog.php">OUR PRODUCTS</a></li>
                            <li><a class="dropdown-item" href="#">TRACK MY ORDER</a></li>
                            <li><a class="dropdown-item" href="#">ORDER HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">HELP CENTER</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img
                                    src="../../../images/tokoTokiLogo1.png" width="50px" height="50px"></li>
                            <div style="position: fixed;width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="../../../images/hang1.png">
                            </div>

                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="me-5 ms-5">
                        <a href="../../../index.php"><img src="../../../images/logo1.png" alt="logo" height="50px"></a>
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

    <form action="../../../include/proses/add_cart.php" method="POST" class="main-container">
        <input type="hidden" name="productID" value="<?= $data['productID'] ?>">
        <input type="hidden" name="jumlah" id="jumlah" value="1">
        <input type="hidden" name="harga" id="harga" value="">
        <div class="row">
            <div class="left-side col-5">
                <div class="product-image">
                    <img src="../../../images/product/<?= $data['image'] ?>" alt="">
                </div>
            </div>

            <div class="right-side col-4">
                <div class="title row">
                    <?= $data['productName'] ?>
                </div>
                <div class="feedback row">
                    <div class="rating col-2 d-flex align-items-center">
                        4.5
                    </div>
                    <div class="star col-8 d-flex align-items-center">
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star-half-full"></span>
                    </div>
                </div>
                <div class="third-row row d-flex align-items-center">
                    <div id="price" class="price col-8">Rp <?= str_replace(",",".",number_format($data['price'])) ?></div>
                    <div id="like" class="like col-4 d-flex justify-content-end align-items-center">
                        <span class="fa fa-heart-o" onclick="like()"></span>
                    </div>
                </div>
                <div class="detail row">
                    <div class="unit row">
                        <div class="property col-4">Unit</div>
                        <div class="value col-4"><?= $data['unit'] ?></div>
                    </div>
                    <div class="stock row">
                        <div class="property col-4">Stock</div>
                        <div class="value col-4"><?= $data['stock'] ?></div>
                    </div>
                    <div class="pet-type row">
                        <div class="property col-4">Pet Type</div>
                        <div class="value col-4"><?= $data['animalType'] ?></div>
                    </div>
                    <div class="category row">
                        <div class="property col-4">Category</div>
                        <div class="value col-4"><?= $data['prodType'] ?></div>
                    </div>
                    <div class="description row"><?= $data['description'] ?></div>
                </div>
            </div>

            <div class="sidebar col-3 d-flex">
                <div class="line"></div>
                <div class="addToCart">
                    <div class="text row">Jumlah Barang</div>
                    <div class="counter">
                        <div class="dec-btn" onclick="decrement()" style="color: #C4C4C4; cursor: pointer">
                            <span id="dec" class="fa fa-minus"></span>
                        </div>
                        <div id="counter-value" class="value d-flex flex-fill justify-content-center">
                            1
                        </div>
                        <div class="inc-btn" onclick="increment()" style="cursor: pointer">
                            <span class="fa fa-plus"></span>
                        </div>
                    </div>
                    <div class="subtotal d-flex align-items-center">
                        <div class="col-4">Subtotal</div>
                        <div id="subprice" class="subprice col-8 d-flex justify-content-end">
                            <!--otomatis-->
                        </div>
                    </div>
                    <button class="addButton d-flex align-items-center" style="border: 0;">
                        <span class="fa fa-cart-plus"></span>
                        ADD TO CHART
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div class="footer">
        <div class="col">
            <p style="text-align: center;margin:0">
                Recalls | Terms of use | Privacy Policy | Interest-Based-Ads | CA Supply Chain Act | Do Not Sell My
                Personal Information
            </p>
        </div>
        <div class="cart">
            <a href="../../../myCart/myCart.php"><img class="cart" src="../../../images/my cart.png" alt=""></a>
        </div>
    </div>

    <script src="animation.js"></script>
    <script src="counter.js"></script>
</body>

</html>