<?php 

include "include/connection.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoToki</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
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
                        <?php if(!empty($_SESSION['level'] == "admin")){ ?>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">EDIT MODE</a></li>
                            <li><a class="dropdown-item" href="editCatalog/editCatalog.html">EDIT CATALOG</a></li>
                            <li><a class="dropdown-item" href="#">ORDERS</a></li>
                            <li><a class="dropdown-item" href="visitHistory/visitHistory.php">VISIT HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">PURCHASE HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">CUSTOMER SERVICE</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img src="images/tokoTokiLogo1.png"
                                    width="50px" height="50px"></li>
                            <div style="position:fixed; width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="images/hang1.png">
                            </div>
                        </ul>
                        <?php } else {?>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">ABOUT US</a></li>
                            <li><a class="dropdown-item" href="productCatalog/productCatalog.php">OUR PRODUCTS</a></li>
                            <li><a class="dropdown-item" href="#">TRACK MY ORDER</a></li>
                            <li><a class="dropdown-item" href="#">ORDER HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">HELP CENTER</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img src="images/tokoTokiLogo1.png"
                                    width="50px" height="50px"></li>
                            <div style="position: fixed;width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="images/hang1.png">
                            </div>
                        </ul>
                        <?php } ?>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="me-5 ms-5">
                        <a href="index.html"><img src="images/logo1.png" alt="logo" height="50px"></a>
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
                        <?php if(empty($_SESSION['email'])){ ?>
                        <div class="col-6" style="border-right: 1px solid #E3E3E3;">
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="nav-link" href="daftar.php" style="color: #E3E3E3;">SIGN UP</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="nav-link" href="login.php" style="color: #E3E3E3;">LOG IN</a>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="col-6">
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="nav-link" href="include/proses/logout.php" style="color: #E3E3E3;">LOG OUT</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row" style="background-color: #CB3525;">
            <div class="col-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"
                    style="height: 100%;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center">
                                <img src="images/whyTokotoki1.png" class="d-block w-70" alt="">
                            </div>
                            <div class="d-flex justify-content-center">
                                <img src="images/fish1.png" class="d-block w-70" alt="">
                            </div>
                            <div class="d-flex justify-content-center">
                                <div style="width: 70%;">
                                    <p style="color: white;">
                                        We sell products such as foods, pet supplies, accesories, and many more.
                                        Currently
                                        we provide products for cats, dogs, rabbits, fish, and birds, but we will
                                        continue to
                                        continue to innovate and improve by providing supplies for other animals.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                <img src="images/whyTokotoki1.png" class="d-block w-70" alt="">
                            </div>
                            <div class="d-flex justify-content-center">
                                <img src="images/fish1.png" class="d-block w-70" alt="">
                            </div>
                            <div class="d-flex justify-content-center">
                                <div style="width: 70%;">
                                    <p style="color: white;">
                                        We sell products such as foods, pet supplies, accesories, and many more.
                                        Currently
                                        we provide products for cats, dogs, rabbits, fish, and birds, but we will
                                        continue to
                                        continue to innovate and improve by providing supplies for other animals.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                <img src="images/whyTokotoki1.png" class="d-block w-70" alt="">
                            </div>
                            <div class="d-flex justify-content-center">
                                <img src="images/fish1.png" class="d-block w-70" alt="">
                            </div>
                            <div class="d-flex justify-content-center">
                                <div style="width: 70%;">
                                    <p style="color: white;">
                                        We sell products such as foods, pet supplies, accesories, and many more.
                                        Currently
                                        we provide products for cats, dogs, rabbits, fish, and birds, but we will
                                        continue to
                                        continue to innovate and improve by providing supplies for other animals.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-6 right-content">
                <img src="images/ajgKcg1.png" style="float: right;">
            </div>
        </div>
        <div class="row mb-5">
            <div class="col d-flex justify-content-center">
                <img src="images/gsbaru.png" alt="">
            </div>
        </div>

        <div class="row footer">
            <div class="col">
                <p style="text-align: center;margin:0">
                    Recalls | Terms of use | Privacy Policy | Interest-Based-Ads | CA Supply Chain Act | Do Not Sell My
                    Personal Information
                </p>
                <?php if(!empty($_SESSION['email'])){ ?>
                <img class="cart" src="images/my cart.png" alt="" onclick="location.href='myCart/myCart.php'">
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>