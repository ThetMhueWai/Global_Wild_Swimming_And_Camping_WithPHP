<?php

session_start();

$id = $_GET['id'];

unset($_SESSION['cart'][$id]);
// echo $id;
header("location: cart.php");
// echo $id;
?>