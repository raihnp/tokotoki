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
    <title>Product Catalog - Tokotoki</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                            <li><a class="dropdown-item" href="productCatalog.php">OUR PRODUCTS</a></li>
                            <li><a class="dropdown-item" href="#">TRACK MY ORDER</a></li>
                            <li><a class="dropdown-item" href="#">ORDER HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">HELP CENTER</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img src="../images/tokoTokiLogo1.png"
                                    width="50px" height="50px"></li>
                            <div style="position: fixed;width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="../images/hang1.png">
                            </div>

                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="me-5 ms-5">
                        <a href="../index.php"><img src="../images/logo1.png" alt="logo" height="50px"></a>
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
        <div class="choose-bar">
            <img src="../images/choose your pet 1.png" alt="">
        </div>

        <div class="slideshow-container">
            <div class="nav-btn">
                <button class="prev" onclick="plusSlides(-1)">
                    <img src="../images/icons8-back-64.png" style="width: 50px; height: 60px;">
                </button>
            </div>

            <div class="slides">
                <div class="slide">
                    <a href="productCatalogCat/productCatalogCat.php">
                        <img class="type-pet" src="../images/kucing kotak.png">
                    </a>
                </div>
                <div class="slide">
                    <a href="productCatalogDog/productCatalogDog.php">
                        <img class="type-pet" src="../images/anjeng kotak.png" alt="">
                    </a>
                </div>
                <div class="slide">
                    <a href="productCatalogRabbit/productCatalogRabbit.php">
                        <img class="type-pet" src="../images/kelinci kotak.png" alt="">
                    </a>
                </div>
                <div class="slide">
                    <a href="productCatalogFish/productCatalogFish.php">
                        <img class="type-pet" src="../images/fish kotak.png" alt="">
                    </a>
                </div>
                
                
                
            </div>

            <div class="nav-btn">
                <button class="next" onclick="plusSlides(1)">
                    <img src="../images/icons8-forward-64.png" style="width: 50px; height: 60px;">
                </button>
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
            <a href="#"><img class="cart" src="../images/my cart.png" alt=""></a>
        </div>
    </div>

    <script src="slider.js"></script>
</body>

</html>