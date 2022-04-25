<?php

include "../../../include/connection.php";

$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$unit = $_POST['unit'];
$weight = $_POST['weight'];
$type = $_POST['type'];
$category = $_POST['category'];
$desc = $_POST['desc'];


if ($_FILES['image']['size'] > 0){
    $tmpFile = $_FILES['image']['tmp_name'];
    $tmpFile2 = $_FILES['image']['tmp_name'];
    $fileName = uniqid().'.jpg';
    $newFile = '../../../images/product/' . $fileName;
    $result = move_uploaded_file($tmpFile, $newFile);

    if ($result) {
        $query = "INSERT INTO `product`(`productName`, `price`, `stock`, `unit`, `weight`, `animalType`, `prodType`, `image`, `description`) 
            VALUES ('$name', $price, $stock, '$unit', $weight, '$type','$category','$fileName','$desc')";

        $sql = mysqli_query($conn, $query);
        if ($sql) {
            echo "<script>alert('Product added successfully');location.href='../../editCatalog.html'</script>";
        } else {
            echo "<script>alert('Can't add the product');history.back()</script>";
        }
    } else {
        echo "<script>alert('Can't add the product');history.back()</script>";
    }
}
else{
    $query = "INSERT INTO `product`(`productName`, `price`, `stock`, `unit`, `weight`, `animalType`, `prodType`, `image`, `description`) 
            VALUES ('$name', $price, $stock, '$unit', $weight, '$type','$category','$fileName','$desc')";

    $sql = mysqli_query($conn, $query);
    if ($sql) {
        echo "<script>alert('Product added successfully');location.href='../../editCatalog.html'</script>";
    } else {
        echo "<script>alert('Can't add the product');history.back()</script>";
    }
}
?>