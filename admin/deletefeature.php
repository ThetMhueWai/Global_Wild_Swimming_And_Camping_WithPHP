<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location: index.php");
}
include "./connection.php";

$id = $_GET['id'];

$result = mysqli_query($connection, "DELETE FROM packagefeature WHERE PKFID='$id'");
if ($result) {
    header("location: feature.php");
} else {
    echo mysqli_connect_error();
}