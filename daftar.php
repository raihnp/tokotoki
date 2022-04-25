<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar User</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <style type="text/css">
    body {
      font-family: 'Nunito', sans-serif;
    }
  </style>
</head>

<body>

<br><br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 bg-dark ps-5 pe-5 text-center text-white" style="border-radius: 20px;">
        <img src="../img/logo.png" alt="logo" style="width:17em;" class="pb-0">
        <form action="include/proses/daftar.php" method="post" class="form-horizontal">
          <div class="form-group input-group mb-3">
            <input type="text" class="form-control" name="nama" placeholder="FULL NAME" required>
          </div>
          <div class="form-group input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="EMAIL ID" required>
          </div>
          <div class="form-group input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="PASSWORD" required>
          </div>
          <div class="form-group input-group mb-3">
            <input type="text" class="form-control" name="telepon" placeholder="PHONE NUMBER" required>
          </div>
          <button class="btn btn-warning text-center fw-bold ps-5 pe-5 mt-3 mb-4" name="daftar" type="submit">SIGN UP</button>
          <br>
          Already have account? <a href="login.php" class="text-white">Login Here </a>
        </form>
        <br>

        <?php
          //jika tombol sign up ditekan
          if(isset($_POST["daftar"]))
          {
            //mengambil isian nama,email,password, dan nomor telepon
            $nama=$_POST["nama"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $telepon=$_POST["telepon"];

            //cek apakah email sudah digunakan
            $ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
            $yangcocok=$ambil->num_rows;
          if($yangcocok==1){
            echo "<script>alert('email has been used');</script>";
            echo "<script>location='daftar.php';</script>";
          }else{
          //query di insert ke tabel pelanggan
          $koneksi->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan)
          VALUES('$email','$password','$nama','$telepon') ");

            echo "<script>alert('account successfully created');</script>";
            echo "<script>location='login.php';</script>";
            }
            }
          ?>

      </div> <!-- .col-md-8 -->
    </div>
  </div>



  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>