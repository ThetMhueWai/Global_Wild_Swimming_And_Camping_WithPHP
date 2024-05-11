<?php
include "connection.php";

if (isset($_POST['btnlogin'])) {
    global $connection;
    $adminEmail = $_POST['adminEmail'];
    $password = $_POST['adminPass'];
    $query = "SELECT * FROM `admin` WHERE `AEmail`='$adminEmail' AND `APassword`='$password'";
    $go_query = mysqli_query($connection,$query);
    if (mysqli_num_rows($go_query) == 1) {
        session_start();
        $_SESSION['admin'] = $adminEmail;
        header("location:dashboard.php");
    } else {
        echo "<script>alert('Incorrect Password and Email')</script>";
    }
    // while ($out = mysqli_fetch_array($go_query)) {
    //     $dbadminEmail = $out['AEmail'];
    //     $dbPassword = $out['APassword'];

    //     if($dbadminEmail != $adminEmail){
    //         echo "<script>window.alert('Email is wrong')</script>";
    //         echo "<script>window.location.href='index.php'</script>";
    //     }else if ($dbPassword != $password) {
    //         echo "<script>window.alert('Password is wrong')</script>";
    //         echo "<script>window.location.href='index.php'</script>";
    //     }else{
    //         $_SESSION['admin'] = $adminEmail;
    //         header('location:dashboard.php');
    //     }
    // }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container"> 
            <form action="" method="POST">
                <div class="formtitle">
                    <!-- <img src="../images/key.png" alt=""> -->
                    <p>Admin Login</p>
                </div>
                <div class="formdiv">
                    <input type="text" name="adminEmail" id="" class="forminput" placeholder=" ">
                    <label for="" class="formlabel loginformlabel">Email</label>
                </div>
                <div class="formdiv">
                    <input type="password" name="adminPass" id="" class="forminput password" placeholder=" ">
                    <label for="" class="formlabel loginformlabel">Password</label>
                </div>
                <div class="showhide">
                    <input type="checkbox" class="checkpass" id="myCheck" name="" onclick="showhidepassword()" value="ShowHidePassword">
                    <label class="checkcheckindex" for="myCheck" id="label"> Show Password</label>
                </div>
                <button type="submit" name="btnlogin" class="formbtn">Sign In</button>
                <!-- <input type="submit" value="Sign In" class="formbtn"> -->
            </form>
    </div>
</body>
<script src="../js/script.js"></script>
</html>