<?php 

include "../connection.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$tel = $_POST['telepon'];

$query = "INSERT INTO `users`(`email`, `password`, `nama`, `telepon`,`level`) 
VALUES ('$email','$password','$nama','$tel','pelanggan')";

$sql = mysqli_query($conn, $query);

if($sql){
    echo "<script>alert('Daftar Berhasil');location.href='../../login.php';</script>";
}
else{
    echo "<script>alert('Daftar Gagal');history.back();</script>";
}

?>