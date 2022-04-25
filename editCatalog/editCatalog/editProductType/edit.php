<?php 

include "../../../include/connection.php";

$old = $_POST['old'];
$new = $_POST['new'];

$query = "UPDATE `product_type` SET `typeName`='$new' WHERE `typeID` = $old";
$sql = mysqli_query($conn, $query);

if($sql){
    echo "<script>alert('Product type edited successfully');location.href='../editCatalogCat.php'</script>";
}
else{
    echo "<script>alert('Can't edit the product type');history.back()</script>";
}

?>