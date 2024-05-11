<?php
session_start();
include "connection.php"; 

if (isset($_POST['update_admin'])) {
    global $connection;
    $admin_id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="../css/style.css">
</head>
<body class="adminbody">
<?php
if(isset($_GET['action']) && $_GET['action']=='edit')
{  
    $id = $_GET['id'];
    $query="SELECT * FROM admin WHERE AdminID='$id'";  
    $go_query=mysqli_query($connection,$query);  
    while($out=mysqli_fetch_array($go_query))
    {   
        $adminname=$out['AdminName'];
        $adminpass=$out['APassword'];   
        $adminemail=$out['AEmail'];
        $adminaddr=$out['AAddress'];
        $aPhone=$out['APhoneNo'];
?>
    <section class="section">
        <?php
        include "header.php";
        ?>
        <div class="admincontainer">
        <div class="admindashboard">
            <div class="formtitle">
                <p>Edit Admin Information</p>
            </div>
            <form action="" method="POST">
                <div class="formdiv">
                    <input type="text" name="adminname" value="<?php echo $adminname ?>" id="" class="forminput" placeholder=" ">
                    <label for="" class="formlabel">Admin Name</label>
                </div>
                <div class="formdiv">
                    <input type="password" name="adminpassword" value="<?php echo $adminpass ?>" id="" class="forminput password" placeholder=" ">
                    <label for="" class="formlabel">Password</label>
                </div>
                <div class="formdiv">
                    <input type="text" name="adminemail" value="<?php echo $adminemail ?>" id="" class="forminput" placeholder=" ">
                    <label for="" class="formlabel">Email</label>
                </div>
                <div class="formdiv">
                    <input type="text" name="adminaddr" value="<?php echo $adminaddr ?>" id="" class="forminput" placeholder=" ">
                    <label for="" class="formlabel">Address</label>
                </div>
                <div class="formdiv">
                    <input type="text" name="adminphone" value="<?php echo $aPhone ?>" id="" class="forminput" placeholder=" ">
                    <label for="" class="formlabel">Phone Number</label>
                </div>
                <div class="showhide">
                    <input type="checkbox" class="checkpass" id="myCheck" name="" onclick="showhidepassword()" value="ShowHidePassword">
                    <label for="myCheck" id="label"> Show Password</label>
                </div>
                <button type="submit" name="update_admin" class="formbtn">Update Admin</button>
                <!-- <input type="submit" value="Register" class="formbtn"> -->
                <a href="setting.php">See Admin Lists</a>
            </form>
        </div>
        </div>
        <?php
    }
}
?>
</section>
<!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>