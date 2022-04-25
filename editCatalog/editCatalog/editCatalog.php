<?php

$animal = $_GET['animal'];

include "../../include/connection.php";

$query = "SELECT * FROM product WHERE animalType = '$animal'";
$sql = mysqli_query($conn, $query);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <title>Edit Catalog <?= $animal ?> - Tokotoki</title>
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
                            <li><a class="dropdown-item" href="#">EDIT MODE</a></li>
                            <li><a class="dropdown-item" href="../editCatalog.html">EDIT CATALOG</a></li>
                            <li><a class="dropdown-item" href="#">ORDERS</a></li>
                            <li><a class="dropdown-item" href="#">PURCHASE HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">CUSTOMER SERVICE</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img src="../../../images/tokoTokiLogo1.png" width="50px" height="50px"></li>
                            <div style="position: fixed;width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="../../../images/hang1.png">
                            </div>

                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="me-5 ms-5">
                        <img src="../../images/logo1.png" alt="logo" height="50px">
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
                                <a class="nav-link" href="../../include/proses/logout.php" style="color: #E3E3E3;">LOG OUT</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <div class="nav-bar d-flex w-100">
            <div class="pet-type">
                <img src="../../../images/cat circle.png" alt="">
                <img src="../../../images/cat teks.png" alt="">
            </div>

            <div class="slideshow-container" style="width: 100%;">
                <div class="nav-btn">
                    <button class="prev" onclick="plusSlides(-1)" id="prev">
                        <img src="../../images/icons8-back-64.png" alt="" style="width: 30px; height: 30px;">
                    </button>
                </div>
                <form action="" method="POST" style="width: 200px;">
                    <div class="slides" style="width: 100%;">ALL</div>
                    <div class="slides" style="width: 100%;">ACCESSORIES</div>
                    <div class="slides" style="width: 100%;">FOODS</div>
                    <div class="slides" style="width: 100%;">SHAMPOO</div>
                    <div class="slides" style="width: 100%;">OTHERS</div>
                </form>
                <div class="nav-btn">
                    <button class="next" onclick="plusSlides(1)" id="next">
                        <img src="../../images/icons8-forward-64.png" alt="" style="width: 30px; height: 30px;">
                    </button>
                </div>
            </div>

            <div class="edit">
                <a class="edit-link" href="#" id="editDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../../images/pensil.png">
                </a>
                <ul class="edit-menu dropdown-menu" aria-labelledby="editDropdown">
                    <li><a class="dropdown-item" href="addProduct/addProduct.php?animal=<?= $animal ?>">ADD PRODUCT</a></li>
                    <li><a class="dropdown-item" href="addProductType/addProductType.php?animal=<?= $animal ?>">ADD PRODUCT TYPE</a></li>
                    <li><a class="dropdown-item" href="editProductType/editProductType.php?animal=<?= $animal ?>">EDIT PRODUCT TYPE</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table border-secondary">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">PRODUCT NAME</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">STOCK</th>
                        <th scope="col">UNIT</th>
                        <th scope="col">WEIGHT</th>
                        <th scope="col">PET TYPE</th>
                        <th scope="col">PRODUCT TYPE</th>
                        <th scope="col" class="long">DESCRIPTION</th>
                        <th scope="fix" class="long">IMAGE</th>
                        <th scope="col">OPTION</th>
                    </tr>
                    <tr id="empty2" style="display: none;"><td><h2 class="mt-5 text-center">Empty</h2></td></tr>
                </thead>

                <tbody id="data">
                    
                    <?php
                    while ($data = mysqli_fetch_array($sql)) { ?>
                        <tr class="row-data">
                            <td scope="row" class="short"></td>
                            <td><?= $data['productName'] ?></td>
                            <td>Rp. <?= number_format($data['price']) ?></td>
                            <td><?= $data['stock'] ?></td>
                            <td><?= $data['unit'] ?></td>
                            <td><?= $data['weight'] ?>kg</td>
                            <td><?= $data['animalType'] ?></td>
                            <td><span class="prodType"><?= $data['prodType'] ?></span></td>
                            <td class="long"><?= $data['description'] ?></td>
                            <td class="fix"><img src="../../images/product/<?= $data['image'] ?>" alt=""></td>
                            <td>
                                <a href="editProduct.php?id=<?= $data['productID'] ?>&animal=<?=$animal?>" class="edit-btn d-flex justify-content-around align-items-center w-100" style=" text-decoration: none; cursor: pointer; margin-bottom: 14px;">
                                    <img src="../../images/icons8-edit-64.png" style="width:20px; height:20px;">
                                    EDIT
                                </a>
                                <a href="delete.php?id=<?= $data['productID'] ?>" class="delete-btn d-flex justify-content-around align-items-center w-100" style=" text-decoration: none; cursor: pointer">
                                    <img src="../../images/icons8-delete-64.png" style="width:20px; height:20px;">
                                    DELETE
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                
            </table>
        </div>

        <div class="back-button">
            <a href="../editCatalog.html">
                <button class="btn d-flex align-items-center justify-content-md-around">
                    <img src="../../images/icons8-exit-64.png" style="width: 20px; height: 20px;" /> BACK
                </button>
            </a>
        </div>
    </div>

    <!-- <script src="slider.js"></script> -->
    <script>
        $(document).ready(function() {         
            $("#prev").on("click", function() {
                document.getElementById("empty2").style.display="none";
                var result = 0;
                let row = document.querySelectorAll(".row-data");
                var i = 0;
                $(".prodType").filter(function() {
                    var data = $(".active").text().toLowerCase();
                    if (data != "others" && data != "all") {
                        if (($(this).text().toLowerCase().indexOf(data) > -1)) {
                            result++;
                            $(row[i]).show();
                        } else {
                            $(row[i]).hide();
                        }
                    } else if (data == "others") {
                        if (($(this).text().toLowerCase().indexOf("accessories") > -1) ||
                            ($(this).text().toLowerCase().indexOf("foods") > -1) ||
                            ($(this).text().toLowerCase().indexOf("shampoo") > -1)) {
                            $(row[i]).hide();
                        } else {
                            result++;
                            $(row[i]).show();
                        }
                    } else {
                        result++;
                        $(row[i]).show();
                    }
                    i++;
                });
                if(result == 0){
                    document.getElementById("empty2").style.display="block";
                }
            });

            $("#next").on("click", function() {
                document.getElementById("empty2").style.display="none";
                var result = 0;
                let row = document.querySelectorAll(".row-data");
                var i = 0;
                $(".prodType").filter(function() {
                    var data = $(".active").text().toLowerCase();
                    if (data != "others" && data != "all") {
                        if (($(this).text().toLowerCase().indexOf(data) > -1)) {
                            result++;
                            $(row[i]).show();
                        } else {
                            $(row[i]).hide();
                        }
                    } else if (data == "others") {
                        if (($(this).text().toLowerCase().indexOf("accessories") > -1) ||
                            ($(this).text().toLowerCase().indexOf("foods") > -1) ||
                            ($(this).text().toLowerCase().indexOf("shampoo") > -1)) {
                            $(row[i]).hide();
                        } else {
                            result++;
                            $(row[i]).show();
                        }
                    } else {
                        result++;
                        $(row[i]).show();
                    }
                    i++;
                });
                if(result == 0){
                    document.getElementById("empty2").style.display="block";
                }
            });
        });
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.querySelectorAll(".slides");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                slides[i].classList.remove("active");
            }
            slides[slideIndex - 1].style.display = "flex";
            slides[slideIndex - 1].classList.add("active");
        }
    </script>
</body>

</html>