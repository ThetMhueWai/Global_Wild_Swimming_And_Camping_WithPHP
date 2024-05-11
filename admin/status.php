<?php
include "connection.php";
$id=$_GET['id'];
$query = "SELECT * FROM booking WHERE BookingID='$id'";
$go_query = mysqli_query($connection, $query);
while ($out = mysqli_fetch_array($go_query)) {
    $dbStatus = $out['BookingStatus'];
    $bookingid = $out['BookingID'];

    echo $bookingid;
    echo $dbStatus;
    if ($dbStatus == 0) {
        $query = "UPDATE booking SET BookingStatus=1,ConfirmDate=now() WHERE BookingID='$id'";
        $go_update = mysqli_query($connection, $query);
        header("location:bookinglist.php");
    }else{
        $query = "UPDATE booking SET BookingStatus=0,ConfirmDate='Null' WHERE BookingID='$id'";
        $go_update = mysqli_query($connection, $query);
        header("location:bookinglist.php");
    }
}
?>