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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard GWSC</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Fontawesome Css Link -->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />    
</head>
<body>
    <section class="dashboard-container">
        <?php
        include("header.php");
        ?>
        <?php
        // if (isset($_POST['update_admin_package'])) {
        //     global $connection;

        // }
        ?>
        <div class="dashboard-setting">
    <!-- Dashboard Lists  -->
    <div class="dashboard">
        <h1>Messages</h1>
        <div class="messages-container">
            <?php
                $query = "SELECT * FROM contact,users WHERE users.UserID=contact.UserID ORDER BY ContactID DESC";
                $go_query = mysqli_query($connection,$query);
                while($out = mysqli_fetch_array($go_query)){
                    $uid = $out['UserID'];
                    $message = $out['Message'];
                    $fName = $out['FirstName'];
                    $sName = $out['SurName'];
                    $uEmail = $out['UEmail'];

                    echo '
                    <div class="message">
                        <p class="message-username">'.$fName.' '.$sName.'</p>
                        <p class="message-email">'.$uEmail.'</p>
                        <p class="message-message">
                            '.$message.'
                        </p>
                    </div>
                    ';
                }
            ?>
        </div>
    </div>
</div>
   <!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>