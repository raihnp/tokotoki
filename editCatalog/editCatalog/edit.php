<?php 

include "../../include/connection.php";
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$unit = $_POST['unit'];
$weight = $_POST['weight'];
$type = $_POST['type'];
$category = $_POST['category'];
$desc = $_POST['desc'];

if ($_FILES['image']['size'] == 0 && $_FILES['image']['error'] == 0){
    $query = "UPDATE `product` SET `productName`='$name',`price`= $price,`stock`= $stock,`unit`='$unit',`weight` = $weight,`animalType`='$type',`prodType`='$category',`description`='$desc' WHERE productID = $id";

    $sql = mysqli_query($conn, $query);

    if($sql){
        echo "<script>alert('Product edited successfully');location.href='../editCatalog.html'</script>";
    }
    else{
        echo "<script>alert('Can't edit the product');history.back()</script>";
    }
}
else {
    $tmpFile = $_FILES['image']['tmp_name'];
    $tmpFile2 = $_FILES['image']['tmp_name'];
    $fileName = uniqid().'.jpg';
    $newFileAdmin = '../../images/product/' . $fileName;
    $newFileUser = '../../../user/images/product/' . $fileName;

    $result = move_uploaded_file($tmpFile, $newFileAdmin);
    copy($newFileAdmin, $newFileUser);
    $query = "UPDATE `product` SET `productName`='$name',`price`= $price,`stock`= $stock,`unit`='$unit',`animalType`='$type',`prodType`='$category',`image`='$fileName',`description`='$desc' WHERE productID = $id";
    if ($result) {
        $sql = mysqli_query($conn, $query);
    
        if($sql){
            echo "<script>alert('Product edited successfully');location.href='../editCatalog.html'</script>";
        }
        else{
            echo "<script>alert('Can't edit the product');history.back()</script>";
        }
    } else {
        echo "<script>alert('Can't add the product');history.back()</script>";
    }
}

