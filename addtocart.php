<?php
session_start();
if (empty($_SESSION['user'])) {
    header('location:login.php');
} else {
    $pdid = $_GET['pdid'];
    $_SESSION['cart'][$pdid]++;
    header("location: cart.php");
}