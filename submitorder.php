<?php
session_start();
include('admin/connection.php');

    $user_id = $_POST['userid'];
    $payment = $_POST['paymentcard'];
    $query = "INSERT INTO booking(UserID,BookingDate,BookingStatus,CardNo) VALUES('$user_id',now(),0,$payment)";
    $go_query = mysqli_query($connection, $query);
    $order_id = mysqli_insert_id($connection);
    foreach($_SESSION['cart'] as $pdid => $qty){
        $getprice = mysqli_query($connection,"SELECT * FROM packagedetail WHERE PDetailID='$pdid'");
        while($out = mysqli_fetch_array($getprice)){
            $db_price = $out['Price'];
            $db_noOfPeople = $out['NoOfPeople'];
            $updatepeople = $db_noOfPeople - $qty;
            $query = "UPDATE packagedetail SET NoOfPeople='$updatepeople' WHERE PDetailID='$pdid'";
            $go_update=mysqli_query($connection, $query);
        }
        $amount = $db_price * $qty;
        $query = "INSERT INTO bookdetail(BookingID,PDetailID,BookPeople,Amount) VALUES('$order_id','$pdid','$qty','$amount')";
        $go_query=mysqli_query($connection,$query);
    }
    $_SESSION['orderid'] = $order_id;
    unset($_SESSION['cart']);
header("location:showsuccess.php");
?>
