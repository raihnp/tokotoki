<?php 

include "../../include/connection.php";
$lc = $_POST['listCart'];
$listCart = explode(",",$_POST['listCart']);
$total = $_POST['total'];
$tarif = $_POST['tarif'];
$kt = $_POST['kota'];
$eks = $_POST['btnradio'];
$street = $_POST['street'];
$district = $_POST['district'];

$query = "SELECT * FROM ongkir WHERE id_ongkir = $kt";
$sql = mysqli_query($conn, $query);
$kota = mysqli_fetch_array($sql);

$qry = "SELECT SUM(product.weight * jumlah) AS total FROM `cart` LEFT JOIN product USING(productID) WHERE id_cart IN (".join(',',$listCart).");";
$sq = mysqli_query($conn, $qry);
$total_weight = mysqli_fetch_array($sq);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Expedition - Tokotoki</title>
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
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">ABOUT US</a></li>
                            <li><a class="dropdown-item" href="../../productCatalog/productCatalog.php">OUR
                                    PRODUCTS</a>
                            </li>
                            <li><a class="dropdown-item" href="#">TRACK MY ORDER</a></li>
                            <li><a class="dropdown-item" href="#">ORDER HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">HELP CENTER</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img
                                    src="../../images/tokoTokiLogo1.png" width="50px" height="50px"></li>
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

    <form method="POST" action="../../include/proses/make_order.php" class="main-container">
        
        <div class="container d-flex">

            <div class="main col-7 d-flex justify-content-center">
                <div class="box" id="leftbox">
                    <div class="head">Checkout</div>
                    <div class="address">
                        <div class="title">Delivery address</div>
                        <div class="address-detail mt-2">
                            <?= $street ?>, <?= $district ?>
                            <p><?= $kota['nama_kota']?></p>
                        </div>
                    </div>

                    <div class="products-detail">
                        <?php
                        $listJumlah = array();
                        $i = 0;
                        $query = "SELECT *, (product.weight * jumlah) AS total FROM `cart` LEFT JOIN product USING(productID) WHERE id_cart IN (".join(',',$listCart).")";
                        $sql = mysqli_query($conn, $query);
                        while($data = mysqli_fetch_array($sql)){
                            $listJumlah[$i++] = $data['jumlah'];
                        ?>
                        <div id="product1" class="product d-flex align-items-center">
                            <div class="product-image d-flex justify-content-center">
                                <img src="../../images/fococlipping-20220308-11039.png" alt="">
                            </div>
                            <div class="product-detail">
                                <div class="product-name"><?= $data['productName']?></div>
                                <div class="quantity"><?= $data['jumlah'] ?> product(s)</div>
                            </div>
                            <div class="subtotal flex-fill">Rp <?= str_replace(",",".",number_format($data['price'])) ?></div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="expedition-choice row mt-3">
                        <div class="title" style="font-weight: 500">Expedition choice</div>
                        <div class="expedition mt-2"><?=$eks?></div>
                    </div>
                </div>
            </div>

            <div class="sidebar col-5">
                <div class="box" id="rightbox">
                    <div class="title">Payment Detail</div>
                    <div class="product-shipping row">
                        <div class="attribute col-5">Total Price</div>
                        <div class="value col-7">Rp <?= str_replace(",",".",number_format($total)) ?></div>
                    </div>
                    <div class="product-price row">
                        <div class="attribute col-5">Shipping</div>
                        <div class="value col-7">Rp <?= str_replace(",",".",number_format($tarif)) ?></div>
                    </div>
                    <div class="product-price row">
                        <div class="attribute col-5">Weight (kg)</div>
                        <div class="value col-7"><?= $total_weight['total'] ?></div>
                    </div>
                    <div class="product-shipping row">
                        <div class="attribute col-5">Total Shipment</div>
                        <div class="value col-7">Rp <?= str_replace(",",".",number_format($tarif * $total_weight['total'])) ?></div>
                    </div>

                    <div class="total-payment row d-flex align-items-center">
                        <div class="attribute col-5">Total Payment</div>
                        <div class="value col-7">Rp <?= str_replace(",",".",number_format($total + ($tarif * (int)$total_weight['total']))) ?></div>
                    </div>

                    <button type="submit" class="order d-flex justify-content-center align-items-center">Make
                        an Order
                    </button>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="col">
                <p style="text-align: center;margin:0">
                    Recalls | Terms of use | Privacy Policy | Interest-Based-Ads | CA Supply Chain Act | Do Not Sell
                    My
                    Personal Information
                </p>
            </div>
        </div>
        <input type="text" id="setTotal" name="total" value="<?= (int)$total + (int)$tarif + ((int)$tarif_ekspedisi * (int)$total_weight['total']) ?>">
        <input type="hidden" name="kota" value="<?= $kota['nama_kota'] ?>">
        <input type="hidden" name="street" value="<?= $street ?>">
        <input type="hidden" name="district" value="<?= $district ?>">
        <input type="hidden" id="listCart" name="listCart" value="<?= $lc ?>">
        <input type="hidden" id="listJumlah" name="listJumlah" value="<?= join(",",$listJumlah) ?>">
        <input type="hidden" name="ekspedisi" value="<?= $eks ?>">
    </form>
</body>

</html>