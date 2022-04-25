<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login User</title>
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
  <br>
  <br>
  <!-- <div class="row justify-content-center">
    <div class="col-md-2 ps-5 pe-1 d-grid gap-2">
      <button class="btn btn-block text-dark border-dark border-1 text-center font-weight-bold pl-5 pr-5 mt-3 mb-4"
        style="border-radius: 10px;">ADMIN</button>
    </div>
    <div class="col-md-2 pe-5 ps-1 d-grid gap-2">
      <a href="../admin/login.php" class="btn btn-block btn-dark text-center font-weight-bold pl-5 pr-5 mt-3 mb-4"
        style="border-radius: 10px;">USER</a>
    </div>
  </div> -->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 bg-dark ps-5 pe-5 text-center text-white" style="border-radius: 20px;">
        <img src="../img/logo.png" alt="logo" style="width:17em;" class="pb-0">
        <form method="post" action="include/proses/login.php">
          <div class="form-group input-group mb-3">
            <input type="email" class="form-control fw-bold" name="email" placeholder="EMAIL" required>
          </div>
          <div class="form-group input-group mb-3">
            <input type="password" class="form-control fw-bold" name="password" placeholder="PASSWORD" required>
          </div>
          <button class="btn btn-warning text-center fw-bold ps-5 pe-5 mt-3 mb-4" name="login"
            style="border-radius: 10px;">LOGIN</button>
          <br>
          New here?<a href="daftar.php" class="text-white">Create an account</a>
        </form>
        <br>
      </div>
    </div>
  </div>

  <br>

</body>

</html>