<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location: index.php");
}
include "connection.php";


    if(isset($_POST['admin_register'])){
        $adminName = $_POST['adminname'];
        $adminPass = $_POST['adminpassword'];
        $adminEmail = $_POST['adminemail'];
        $adminAddress = $_POST['adminaddr'];
        $adminPhone = $_POST['adminphone'];

        if (strlen($adminName) < 3) {
            echo "<script>window.alert('Admin Name need to be longer!')</script>";
            echo "<script>window.location.href='addAdmin.php'</script>";
        }
        
        if (strlen($adminPass) < 3) {
            echo "<script>window.alert('Password need to be longer!')</script>";
            echo "<script>window.location.href='addAdmin.php'</script>";
        }
        
        if ($adminName != "" && $adminPass != "" && $adminEmail != "" && $adminAddress != "" && $adminPhone != "") {
        global $connection;
        global $adminName;
        global $adminPass;
        global $adminEmail;
        global $adminAddress;
        global $adminPhone;
        $query = "SELECT * FROM admin";
        $go_query = mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($go_query))
        {
            $dbadminname = $row['AdminName'];
            $dbemail = $row['AEmail'];
            $dbphone = $row['APhoneNo'];
        }
        if($adminName == $dbadminname){
            echo "<script>window.alert('This Admin Name is already exists!!!')</script>";
            echo "<script>window.location.href='setting.php'</script>";
        }
        elseif ($adminEmail == $dbemail) {
            echo "<script>window.alert('This Email is already exists!!!')</script>";
            echo "<script>window.location.href='setting.php'</script>";
        }
        else{
            $query = "INSERT INTO admin(AdminName,APassword,AEmail,AAddress,APhoneNo) VALUES ('$adminName','$adminPass','$adminEmail','$adminAddress','$adminPhone')";
            $go_query = mysqli_query($connection,$query);
            if (!$go_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            echo "<script>window.alert('Successfully created an account')</script>";
            echo "<script>window.location.href='setting.php'</script>";
        }
        }
    }
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
        <!-- Right Side - Setting -->
        <div class="dashboard-setting">
        <!-- Admin Register Form -->
        <form class="admin-register-form" method="POST">
            <h1>Admin Register Form</h1>
            <label for="admin-name">Admin Name</label>
            <input
                type="text"
                name="adminname"
                id="admin-name"
                placeholder="Enter admin name"
                required
            />

            <label for="password">Password</label>
            <input
                class="password"
                type="password"
                name="adminpassword"
                id="password"
                placeholder="Enter your password"
                required
            />

            <label for="email">Email</label>
            <input
                type="email"
                name="adminemail"
                id="email"
                placeholder="Enter your email"
                required
            />

            <label for="phone">Phone</label>
            <input
                type="phone"
                name="adminphone"
                id="phone"
                placeholder="Enter your phone number"
                required
            />

            <label for="address">Address</label>
            <textarea
                name="adminaddr"
                id="address"
                cols="30"
                rows="3"
                placeholder="Enter your address"
                required
            ></textarea>

            <div class="showhide show">
                <input type="checkbox" class="checkpass" id="myCheck" name="" onclick="showhidepassword()" value="ShowHidePassword">
                <label class="checkcheck" for="myCheck" id="label"> Show Password</label>
            </div>
            <div class="admin-register-form-btn-group">
                <button name="admin_register" class="admin-register-btn">Admin Register</button>
                <a href="setting.php" class="see-admin-lists-link">See admin lists</a>
            </div>
        </form>
      </div>
    </section>
    <!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>