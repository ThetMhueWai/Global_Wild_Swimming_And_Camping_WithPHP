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
    <?php
        if(isset($_POST['updateAdmin']))
        {
            global $connection;
            $admin_id = $_GET['id'];
            $adminName = $_POST['updatename'];
            $Adminpassword = $_POST['updatePass'];
            $Adminemail = $_POST['updateemail'];
            $AdminPhone = $_POST['adminphone'];
            $AdminAddr = $_POST['adminaddr'];

            $query = "UPDATE admin SET AdminName='$adminName',AdminID='$admin_id',";
            $query .= "APassword='$Adminpassword',AEmail='$Adminemail',AAddress='$AdminAddr',APhoneNo='$AdminPhone' WHERE adminID='$admin_id'";
            $go_query = mysqli_query($connection,$query);
            if(!$go_query){
                die("QUERY FAILED" . mysqli_error($connection));
            }
            else{
                header("location:setting.php");
            }
        }
    ?>
    <section class="dashboard-container">
        <?php
        include("header.php");
        ?>
        <!-- Right Side - Setting -->
        <div class="dashboard-setting">
            <!-- Admin Register Form -->
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'edit') {
                $aid = $_GET['id'];
                $query = "SELECT * FROM admin WHERE AdminID ='$aid'";
                $go_query = mysqli_query($connection,$query);
                while($out = mysqli_fetch_array($go_query))
                {
                    $adminName = $out['AdminName'];
                    $adminpass = $out['APassword'];
                    $adminemail = $out['AEmail'];
                    $adminAddress = $out['AAddress'];
                    $adminPhone = $out['APhoneNo'];
            ?>
            <form class="admin-register-form" method="POST">
                <h1>Admin Register Form</h1>
                <label for="admin-name">Admin Name</label>
                <input type="text" name="updatename" value="<?php echo $adminName ?>" id="admin-name" placeholder="Enter admin name" required />

                <label for="password">Password</label>
                <input class="password" name="updatePass" type="password" value="<?php echo $adminpass ?>" name="adminpassword" id="password"
                    placeholder="Enter your password" required />

                <label for="email">Email</label>
                <input type="email" name="updateemail" value="<?php echo $adminemail ?>" id="email" placeholder="Enter your email" required />

                <label for="phone">Phone</label>
                <input type="phone" name="adminphone" value="<?php echo $adminPhone ?>" id="phone" placeholder="Enter your phone number" required />

                <label for="address">Address</label>
                <textarea name="adminaddr" id="address" cols="30" rows="3" placeholder="Enter your address" required><?php echo $adminAddress ?></textarea>

                <div class="showhide show">
                    <input type="checkbox" class="checkpass" id="myCheck" name="" onclick="showhidepassword()" value="ShowHidePassword">
                    <label class="checkcheck" for="myCheck" id="label"> Show Password</label>
                </div>
                <div class="admin-register-form-btn-group">
                    <button name="updateAdmin" class="admin-register-btn">Update Account</button>
                    <a href="setting.php" class="see-admin-lists-link">See admin lists</a>
                </div>
            </form>
            <?php
                }
            } 
            ?>
        </div>
    </section>
    <!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>