<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location: index.php");
}
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Fontawesome Css Link -->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <!-- Css Link -->
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <section class="dashboard-container">
        <!-- 
            LEFT SIDE - MENU BAR
        -->
        <?php
        include("header.php");
        ?>
        <!-- 
            RIGHT SIDE - ACCOUNT SETTING
        -->
        <div class="dashboard-setting">
            <!-- Dashboard Lists  -->
            <div class="dashboard">
                <h1>Bookings</h1>
                <table class="admin-table">
                    <tr class="first-row">
                        <th>User Name</th>
                        <th>Package Name</th>
                        <th>Type</th>
                        <th>Guests</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM users,booking,packagetypes,bookdetail,packagedetail,packages WHERE booking.BookingID=bookdetail.BookingID AND bookdetail.PDetailID=packagedetail.PDetailID AND booking.UserID=users.UserID AND packages.PKID=packagedetail.PKID AND packagetypes.PKTID=packagedetail.PKTID";
                        $go_query = mysqli_query($connection,$query);
                        while ($out = mysqli_fetch_array($go_query)){
                            $fname = $out['FirstName'];
                            $sname = $out['SurName'];
                            $pName = $out['PKName'];
                            $pType = $out['PKTName'];
                            $noOfgust = $out['BookPeople'];
                            $amount = $out['Amount'];
                            $bookingid = $out['BookingID'];
                            $status = $out['BookingStatus'];

                            echo'
                                <tr>
                                    <td>'.$fname.'</td>
                                    <td>'.$pName.'</td>
                                    <td>'.$pType.'</td>
                                    <td>'.$noOfgust.'</td>
                                    <td>$ '.$amount.'</td>
                                    <td>';
                                        if ($status == 0) {
                                echo'            <button class="feature-list-edit-btn">
                                                <a href="status.php?id=' . $bookingid . '">Pending</a>
                                            </button>  
                                            '; 
                                        }else{
                                echo '            <button class="feature-list-edit-btn">
                                                <a href="status.php?id=' . $bookingid . '">Confirm</a>
                                            </button>  
                                        '; 
                                        }
                            echo '
                                    </td>
                                </tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
    <!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>