<?php
session_start();
include('admin/connection.php');
$id = $_GET['id'];
$query = "select NoOfPeople from packagedetail where PDetailID = '$id'";
$goquery = mysqli_query($connection, $query);
while ($out = mysqli_fetch_assoc($goquery)) {
    $qty = $out['NoOfPeople'];
    $a = $_SESSION['cart'][$id];
    if ($a < $qty) {
        $_SESSION['cart'][$id]++;
        header("location: cart.php");
    }
    echo "<script>window.alert('This Product is limited,')</script>";
    echo "<script>window.location.href='cart.php'</script>";
}
?>