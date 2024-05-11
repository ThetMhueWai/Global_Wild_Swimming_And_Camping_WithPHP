<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location: index.php");
}
include "./connection.php";

$id = $_GET['id'];

$result = mysqli_query($connection, "DELETE FROM packagedetail WHERE PDetailID='$id'");
if ($result) {
    echo "<script>window.alert('Delete packagedetail')</script>";
    header("location: localAttr.php");
} else {
    echo mysqli_connect_error();
}