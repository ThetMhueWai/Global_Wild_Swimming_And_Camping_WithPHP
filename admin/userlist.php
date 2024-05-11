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
                <h1>User Lists</h1>
                <table class="admin-table">
                    <tr class="first-row">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Sur Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM users ORDER BY UserID DESC";
                    $go_query = mysqli_query($connection,$query);
                    while ($out = mysqli_fetch_array($go_query)) {
                        $userid = $out['UserID'];
                        $fName = $out['FirstName'];
                        $sName = $out['SurName'];
                        $Uadd = $out['UAddress'];
                        $UEmail = $out['UEmail'];
                        $Uphone = $out['UPhoneNo'];

                        echo'
                        <tr>
                        <td>'.$userid.'</td>
                        <td>'.$fName.'</td>
                        <td>'.$sName.'</td>
                        <td>'.$UEmail.'</td>
                        <td>'.$Uadd.'</td>
                        <td>'.$Uphone.'</td>
                        </tr>
                        ';
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