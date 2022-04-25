<?php 

include "../../../include/connection.php";

$name = $_POST['name'];

$query = "INSERT INTO `product_type`(`typeName`) VALUES ('$name')";
$sql = mysqli_query($conn, $query);

if($sql){
    echo "<script>alert('Product type added successfully');location.href='../editCatalogCat.php'</script>";
}
else{
    echo "<script>alert('Can't add the product');history.back()</script>";
}

?>