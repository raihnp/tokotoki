<?php 

include "../../../include/connection.php";

$animal = $_GET['animal'];

$query = "SELECT * FROM product_type";
$sql = mysqli_query($conn, $query);

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
    <title>Edit Product Type <?= $animal ?> - Tokotoki</title>
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
                            <li><a class="dropdown-item" href="#">EDIT MODE</a></li>
                            <li><a class="dropdown-item" href="../../editCatalog.php">EDIT CATALOG</a></li>
                            <li><a class="dropdown-item" href="#">ORDERS</a></li>
                            <li><a class="dropdown-item" href="#">PURCHASE HISTORY</a></li>
                            <li><a class="dropdown-item" href="#">CUSTOMER SERVICE</a></li>
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
                        <img src="../../../images/logo1.png" alt="logo" height="50px">
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
                            <a class="nav-link" href="../../../include/proses/logout.php" style="color: #E3E3E3;">LOG OUT</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <div class="nav-bar">
            <div class="nav">
                <div class="nav-menu" id="page1" onclick="location.href='../addProduct/addProduct.php?animal=<?= $animal ?>'"
                    style="cursor: pointer">ADD PRODUCT
                </div>
                <div class="nav-menu" id="page2" onclick="location.href='../addProductType/addProductType.php?animal=<?= $animal ?>'"
                    style="cursor: pointer">ADD
                    PRODUCT TYPE
                </div>
                <div class="nav-menu" id="page3" style="cursor: pointer">EDIT
                    PRODUCT TYPE</div>
            </div>

            <div class="pet-type">
                <img src="../../../images/<?= $animal ?> circle.png" alt="">
                <img src="../../../images/<?= $animal ?> teks.png" alt="">
            </div>
        </div>

        <div class="main">
            <form action="edit.php" method="POST">
                <div class="choose mb-5">
                    <label for="selector" class="form-label">CHOOSE PRODUCT TYPE</label>
                    <select id="selector" name="old" class="form-select sticky-top">
                        <option selected hidden>Product Type</option>
                        <?php while($data = mysqli_fetch_array($sql)){ ?>
                            <option value="<?= $data['typeID'] ?>"><?= $data['typeName'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="new-type">
                    <label class="form-label">ENTER NEW NAME</label>
                    <input type="text" class="form-control" name="new" placeholder="Product Type">
                </div>

                <div class="submit-button">
                    <button type="submit" class="btn btn-warning d-flex align-items-center justify-content-md-around">
                        <img src="../../../images/icons8-update.png" style="width: 16px; height: 16px;" />
                        <span style="font-size: 14px">UPDATE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>