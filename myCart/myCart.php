<?php 

include "../include/connection.php";

$query = "SELECT * FROM `cart` LEFT JOIN product USING(productID) WHERE id_users = ".$_SESSION['id_users'];
$sql = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart - Tokotoki</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <li><a class="dropdown-item" href="editCatalog/editCatalog.php">EDIT CATALOG</a></li>
                            <li><a class="dropdown-item" href="#">ORDERS</a></li>
                            <li><a class="dropdown-item" href="visitHistory/visitHistory.php">VISIT HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">PURCHASE HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">CUSTOMER SERVICE</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img src="../images/tokoTokiLogo1.png"
                                    width="50px" height="50px"></li>
                            <div style="position:fixed; width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="../images/hang1.png">
                            </div>
                        </ul>
                        <?php } else {?>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">ABOUT US</a></li>
                            <li><a class="dropdown-item" href="productCatalog/productCatalog.php">OUR PRODUCTS</a></li>
                            <li><a class="dropdown-item" href="#">TRACK MY ORDER</a></li>
                            <li><a class="dropdown-item" href="#">ORDER HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">HELP CENTER</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img src="../images/tokoTokiLogo1.png"
                                    width="50px" height="50px"></li>
                            <div style="position: fixed;width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="../images/hang1.png">
                            </div>
                        </ul>
                        <?php } ?>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="me-5 ms-5">
                        <a href="../index.php"><img src="../images/logo1.png" alt="logo" height="50px"></a>
                    </div>
                    <div class="flex-grow-1 me-5 ms-5"></div>
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
                                <a class="nav-link" href="../include/proses/logout.php" style="color: #E3E3E3;">LOG OUT</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <div class="title">
            <img src="../images/title.png" alt="">
        </div>
        <form class="cart" method="POST" action="destination/destination.php">
            <table class="table border-0 m-0">
                <tbody>
                    <?php $listCart = array(); $i = 1; while($data = mysqli_fetch_array($sql)){ 
                            $listCart[$i-1] = $data['id_cart'];
                        ?>
                        <input type="hidden" id="id_cart" value="<?= $data['id_cart'] ?>">
                        <tr id="item-<?=$i?>" class="d-flex justify-content-center">
                            <td class="check d-flex justify-content-end" style="width: 77px">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onclick="check(<?=$i?>)" checked>
                                </div>
                            </td>
                            <td class="productImage" style="width: 154px">
                                <img src="../images/product/<?= $data['image'] ?>" alt="">
                            </td>
                            <td class="detail">
                                <div class="name row">
                                    <?= $data['productName'] ?>
                                </div>
                                <div class="price row">
                                    Rp <?= str_replace(",",".",number_format($data['harga'])) ?>
                                </div>
                                <div class="counter">
                                    <div class="dec-btn" onclick="decrement(<?=$i?>)" style="cursor: pointer">
                                        <span class="fa fa-minus"></span>
                                    </div>
                                    <div id="counter-value" class="value d-flex flex-fill justify-content-center">
                                        <?= $data['jumlah'] ?>
                                    </div>
                                    <div class="inc-btn" onclick="increment(<?=$i?>)" style="cursor: pointer">
                                        <span class="fa fa-plus"></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php $i++;} ?>
                    <!-- <tr id="item-2" class="d-flex justify-content-center">
                        <td class="check d-flex justify-content-end" style="width: 77px">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" onclick="check(2)" checked>
                            </div>
                        </td>
                        <td class="productImage" style="width: 154px">
                            <img src="../images/fococlipping-20220308-172614.png" alt="">
                        </td>
                        <td class="detail">
                            <div class="name row">
                                Wet Food Pouch for Dog
                            </div>
                            <div class="price row">
                                Rp 60.000
                            </div>
                            <div class="counter">
                                <div class="dec-btn" onclick="decrement(2)" style="cursor: pointer">
                                    <span class="fa fa-minus"></span>
                                </div>
                                <div id="counter-value" class="value d-flex flex-fill justify-content-center">
                                    2
                                </div>
                                <div class="inc-btn" onclick="increment(2)" style="cursor: pointer">
                                    <span class="fa fa-plus"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr id="item-3" class="d-flex justify-content-center">
                        <td class="check d-flex justify-content-end" style="width: 77px">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" onclick="check(3)" checked>
                            </div>
                        </td>
                        <td class="productImage" style="width: 154px">
                            <img src="../images/fococlipping-20220308-172614.png" alt="">
                        </td>
                        <td class="detail">
                            <div class="name row">
                                Wet Food Pouch for Dog
                            </div>
                            <div class="price row">
                                Rp 20.000
                            </div>
                            <div class="counter">
                                <div class="dec-btn" onclick="decrement(3)" style="cursor: pointer">
                                    <span class="fa fa-minus"></span>
                                </div>
                                <div id="counter-value" class="value d-flex flex-fill justify-content-center">
                                    1
                                </div>
                                <div class="inc-btn" onclick="increment(3)" style="cursor: pointer">
                                    <span class="fa fa-plus"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr id="item-4" class="d-flex justify-content-center">
                        <td class="check d-flex justify-content-end" style="width: 77px">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" onclick="check(4)" checked>
                            </div>
                        </td>
                        <td class="productImage" style="width: 154px">
                            <img src="../images/fococlipping-20220308-172614.png" alt="">
                        </td>
                        <td class="detail">
                            <div class="name row">
                                Wet Food Pouch for Dog
                            </div>
                            <div class="price row">
                                Rp 20.000
                            </div>
                            <div class="counter">
                                <div class="dec-btn" onclick="decrement(4)" style="cursor: pointer">
                                    <span id="dec" class="fa fa-minus"></span>
                                </div>
                                <div id="counter-value" class="value d-flex flex-fill justify-content-center">
                                    1
                                </div>
                                <div class="inc-btn" onclick="increment(4)" style="cursor: pointer">
                                    <span class="fa fa-plus"></span>
                                </div>
                            </div>
                        </td>
                    </tr> -->
                </tbody>
            </table>
            <div class="checkout row d-flex align-items-center">
                <div class="text col-5">TOTAL</div>
                <div id="total" class="total col-4">Rp 00.000</div>
                <input type="hidden" id="setTotal" name="total">
                <input type="hidden" id="listCart" name="listCart" value="<?= implode(",",$listCart); ?>">
                <?php if(empty($listCart)){ ?>
                    <a href="../index.php" class="checkout-btn col-2 cursor-pointer d-flex justify-content-center align-items-center" style="text-decoration: none; color: black;">
                    BACK
                    </a>
                <?php } else { ?>
                <button class="checkout-btn col-2 cursor-pointer d-flex justify-content-center align-items-center" onclick="submit()">
                    CHECKOUT
                </button>
                <?php } ?>
            </div>
        </form>

        <div class="footer">
            <div class="col">
                <p style="text-align: center;margin:0">
                    Recalls | Terms of use | Privacy Policy | Interest-Based-Ads | CA Supply Chain Act | Do Not Sell My
                    Personal Information
                </p>
            </div>
        </div>
    </div>

    <script src="counter.js"></script>
</body>

</html>