<?php 

include "../connection.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

$sql = mysqli_query($conn, $query);
$data = mysqli_fetch_array($sql);
$row = mysqli_num_rows($sql);

if($row > 0){
    $query2 = "INSERT INTO `visit_history`(`id_users`, `date`) 
                VALUES ('".$data['id_users']."',CURRENT_TIMESTAMP)";
    $sql2 = mysqli_query($conn, $query2);

    $_SESSION['id_users'] = $data['id_users'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['telepon'] = $data['telepon'];
    
    echo "<script>alert('Login Berhasil');location.href='../../index.php';</script>";
}
else{
    echo "<script>alert('Login Gagal');history.back();</script>";
}

?>