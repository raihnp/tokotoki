<?php

include "../include/connection.php";

$query = "SELECT * FROM `visit_history` LEFT JOIN users USING(id_users)";
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
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <title>Visit History - tokotoki</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <div class="navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-4 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </a>
                        <?php if (!empty($_SESSION['level'] == "admin")) { ?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">EDIT MODE</a></li>
                                <li><a class="dropdown-item" href="editCatalog/editCatalog.php">EDIT CATALOG</a></li>
                                <li><a class="dropdown-item" href="#">ORDERS</a></li>
                                <li><a class="dropdown-item" href="visitHistory/visitHistory.php">VISIT HISTORY</a></li>
                                <li><a class="dropdown-item" href="#">PURCHASE HISTORY</a></li>
                                <li><a class="dropdown-item" href="#">CUSTOMER SERVICE</a></li>
                                <li style="background-color:rgba(255, 255, 255, 0);"><img src="../images/tokoTokiLogo1.png" width="50px" height="50px"></li>
                                <div style="position:fixed; width: 100%;margin-top: -20px;margin-left: 63px;">
                                    <img src="../images/hang1.png">
                                </div>
                            </ul>
                        <?php } else { ?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">ABOUT US</a></li>
                                <li><a class="dropdown-item" href="productCatalog/productCatalog.php">OUR PRODUCTS</a></li>
                                <li><a class="dropdown-item" href="#">TRACK MY ORDER</a></li>
                                <li><a class="dropdown-item" href="#">ORDER HISTORY</a></li>
                                <li><a class="dropdown-item" href="#">HELP CENTER</a></li>
                                <li style="background-color:rgba(255, 255, 255, 0);"><img src="../images/tokoTokiLogo1.png" width="50px" height="50px"></li>
                                <div style="position: fixed;width: 100%;margin-top: -20px;margin-left: 63px;">
                                    <img src="../images/hang1.png">
                                </div>
                            </ul>
                        <?php } ?>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="me-5 ms-5">
                        <a href=""><img src="../images/logo1.png" alt="logo" height="50px"></a>
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
                        <?php if (empty($_SESSION['email'])) { ?>
                            <div class="col-6" style="border-right: 1px solid #E3E3E3;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="nav-link" href="../daftar.php" style="color: #E3E3E3;">SIGN UP</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="nav-link" href="../login.php" style="color: #E3E3E3;">LOG IN</a>
                                </div>
                            </div>
                        <?php } else { ?>
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
            <img src="../images/visit 1.png" alt="">
        </div>

        <div class="history">
            <table class="table border-secondary">
                <thead>
                    <tr>
                        <th id="no" scope="col">NO</th>
                        <th scope="col">USERNAME</th>
                        <th scope="col">DATE, TIME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                        $dt = explode(" ", $data['date']);
                        $dts = strtotime($dt[0]);
                        $day = date("l", $dts);
                        $month = date("F", $dts);
                        $date = date("d", $dts);
                        $year = date("Y", $dts);

                        $day = strtolower($day);
                        $month = strtolower($month);

                            if ($day == "sunday")
                                $day = "Minggu";
                            else if ($day == "monday")
                                $day = "Senin";
                            else if ($day == "tuesday")
                                $day = "Selasa";
                            else if ($day == "wednesday")
                                $day = "Rabu";
                            else if ($day == "thursday")
                                $day = "Kamis";
                            else if ($day == "friday")
                                $day = "Jum'at";
                            else if ($day == "saturday")
                                $day = "Sabtu";

                            if ($month == "January")
                                $month = "Januari";
                            else if ($month == "February")
                                $month = "Februari";
                            else if ($month == "March")
                                $month = "Maret";
                            else if ($month == "April")
                                $month = "April";
                            else if ($month == "May")
                                $month = "Mei";
                            else if ($month == "June")
                                $month = "Juni";
                            else if ($month == "July")
                                $month = "Juli";
                            else if ($month == "August")
                                $month = "Agustus";
                            else if ($month == "September")
                                $month = "September";
                            else if ($month == "October")
                                $month = "Oktober";
                            else if ($month == "November")
                                $month = "November";
                            else if ($month == "December")
                                $month = "Desember";
                        
                    ?>
                        <tr>
                            <th id="no" scope="row"><?= $i++ ?></th>
                            <td><?= $data['email'] ?></td>
                            <td><?= $day . ", ".$date." ". ucfirst($month) . " " . $year. ", ".$dt[1] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <div class="col">
                <p style="text-align: center;margin:0">
                    Recalls | Terms of use | Privacy Policy | Interest-Based-Ads | CA Supply Chain Act | Do Not Sell My
                    Personal Information
                </p>
            </div>
        </div>
    </div>
</body>

</html>