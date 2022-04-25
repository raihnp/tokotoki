<?php 

include "../../include/connection.php";

$listCart = $_POST['listCart'];
$total = $_POST['total'];

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

    <div class="main-container">
        <div class="container">
            <div class="box">
                <div id="title">Address</div>
                <div id="addition">Enter the delivery address</div>
                <form action="../expedition/expedition.php" method="POST" class="row g-3 needs-validation" novalidate autocomplete="off">
                    <input type="hidden" id="setTotal" name="total" value="<?= $total ?>">
                    <input type="hidden" id="listCart" name="listCart" value="<?= $listCart ?>">
                    <div class="city">
                        <label for="selectcity" class="form-label">City <span>*</span></label>
                        <select class="form-select" id="selectcity" name="kota" required>
                            <option selected hidden disabled>Choose...</option>
                            <?php 
                                $query = "SELECT * FROM ongkir";
                                $sql = mysqli_query($conn, $query);
                                while($data = mysqli_fetch_array($sql)){
                            
                            ?>
                            <option value="<?= $data['id_ongkir'] ?>"><?= $data['nama_kota'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Please choose a city
                        </div>
                    </div>

                    <div class="address d-flex mb-2">
                        <div class="district col-8">
                            <label class="form-label" for="street">Street <span>*</span></label>
                            <input type="text" id="street" name="street" class="form-control" placeholder="ex: Jl. Kenari No. 22"
                                required>
                            <div class="invalid-feedback">Street is required</div>
                        </div>

                        <div class="district col-4">
                            <label class="form-label" for="district">District <span>*</span></label>
                            <input type="text" id="district" name="district" class="form-control" placeholder="ex: Candisari" required>
                            <div class="invalid-feedback">District is required</div>
                        </div>
                    </div>

                    <div class="shipping row">
                        <div class="col-5" style="font-weight: 500; color: grey">Shipping</div>
                        <div class="price col-7" style="text-align: right" id="shippingPrice">Rp 0</div>
                        <input type="hidden" name="tarif" id="settarif">
                    </div>
                    <button type="submit">Use This Address</button>
                </form>
            </div>
        </div>
        <div id="listTarif">
        <?php 
        
        $query = "SELECT * FROM `ongkir`";
        $sql = mysqli_query($conn, $query);
        $x = 0;
        while($data = mysqli_fetch_array($sql)){
        ?>
            <input type="hidden" class="tarif<?=$data['id_ongkir']?>" id="tariff" value="<?= $data['tarif'] ?>">
        <?php } ?>
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
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="validation.js"></script> -->
    <script>
        $(document).ready(function() {         
            $("#selectcity").on("change", function() {
                var v = $(this).val();
                let row = Array.from(document.querySelectorAll('#tariff'), ({ value }) => value);
                let tempArr = document.querySelectorAll('#tariff');
                $("#tariff").filter(function() {
                    var p = document.getElementById("selectcity").selectedIndex;
                    var price = row[p];
                    document.getElementById("settarif").value = price;
                    document.getElementById("shippingPrice").innerHTML = addCommas(price);
                })
            });
        });

        function addCommas(nStr)
        {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
            }
            return "Rp "+x1 + x2;
        }
    </script>
</body>

</html>