<?php 

include "../connection.php";

$idp = $_GET['id'];
$idu = $_SESSION['id_users'];
$jumlah = $_GET['jumlah'];
$harga = $_GET['harga'];

$query = "UPDATE `cart` SET `jumlah`=$jumlah,`harga`=$harga WHERE id_cart = $idp AND id_users = $idu";

$sql = mysqli_query($conn, $query);

if($sql){
    echo "<script>location.href='../../myCart/myCart.php';</script>";
}
else{
    echo "<script>location.href='../../myCart/myCart.php';</script>";
}

?>