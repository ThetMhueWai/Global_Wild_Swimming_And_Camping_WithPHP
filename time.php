<?php session_start();
session_destroy();
setcookie('user', 'Try After 10 Minutes', time() + 600);
header("location:login.php");
?>