<?php 

include "../connection.php";

$id = $_GET['id'];

$query = "DELETE FROM `cart` WHERE id_cart= $id";

$sql = mysqli_query($conn, $query);

if($sql){
    echo "<script>location.href='../../myCart/myCart.php';</script>";
}
else{
    echo "<script>location.href='../../myCart/myCart.php';</script>";
}

?>