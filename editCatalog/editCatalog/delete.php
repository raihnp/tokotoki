<?php 

include "../../include/connection.php";

$id = $_GET['id'];

$query = "DELETE FROM product WHERE productID = $id";
$sql = mysqli_query($conn, $query);

if($sql){
    echo "<script>alert('Product deleted successfully');location.href='../editCatalog.html'</script>";
}
else{
    echo "<script>alert('Can't delete the product');history.back()</script>";
}

?>