<?php 

include "../connection.php";
$listCart = $_POST['listCart'];
$listJumlah = $_POST['listJumlah'];
$total = $_POST['total'];
$kota = $_POST['kota'];
$eks = $_POST['ekspedisi'];
$street = $_POST['street'];
$district = $_POST['district'];
$idp = $_SESSION['id_users'];
$alamat = $street.",".$district.",".$kota;

$query = "INSERT INTO `pembelian`(`id_product`, `id_pelanggan`, `jumlah_product` ,`nama_ekspedisi`, `tanggal_pembelian`, `alamat_pengiriman`, `total`) 
VALUES ('$listCart',$idp,'$listJumlah','$eks',NOW(),'$alamat', $total)";
$sql = mysqli_query($conn, $query);

if($sql){
    $listCart = explode(",",$listCart);
    $query = "DELETE FROM `cart` WHERE id_cart IN (".join(',',$listCart).")";
    $sql = mysqli_query($conn, $query);
    if($sql){
        echo "<script>alert('Order Berhasil');location.href='../../index.php';</script>";
    }
    else{
        echo "<script>alert('Order Gagal');location.href='../../myCart/myCart.php'</script>";
    }
}
else{
    echo "<script>alert('Order Gagal');location.href='../../myCart/myCart.php'</script>";
}

?>