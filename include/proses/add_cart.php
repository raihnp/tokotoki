<?php 

include "../connection.php";
if(empty($_SESSION['id_users'])){
    echo "<script>alert('Login Terlebih Dahulu');location.href='../../login.php';</script>";
}
else{
    $idp = $_POST['productID'];
    $idu = $_SESSION['id_users'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO `cart`(`id_users`, `productID`, `jumlah`, `harga`) 
    VALUES ('$idu','$idp','$jumlah','$harga')";

    $sql = mysqli_query($conn, $query);

    if($sql){
        echo "<script>alert('Product Ditambahkan Ke Cart');history.back();</script>";
    }
    else{
        
    }
}

?>