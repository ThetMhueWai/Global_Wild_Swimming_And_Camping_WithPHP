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

<body class="adminbody">
    <section class="dashboard-container">
        <?php
            if (isset($_POST['AddPickageDetail'])) {
                global $connection;
                $package = $_POST['package'];
                $packageType = $_POST['packageType'];
                $priceforOne = $_POST['price'];
                $Noofpeople = $_POST['people'];
                $status = $_POST['status'];
    
                if($package != "" && $packageType != ""){
                    $query = "INSERT INTO packagedetail (PKID,PKTID,Price,NoOfPeople,Status,View) VALUES('$package','$packageType','$priceforOne','$Noofpeople','$status','1')";
                    $go_query = mysqli_query($connection,$query);
                    if (!$go_query) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }else{
                    echo "<script>window.alert('PackageDetail is successfully insert')</script>";
                    echo "<script>window.location.href='package.php'</script>";
                }
                }
            }
        ?>
        <?php
        include("header.php");
        ?>
        <!-- Right Side - Setting -->
        <div class="dashboard-setting">
            <!-- Add Pitch Type Form -->
            <div class="add-package-type-form">
                <form method="POST" enctype="multipart/form-data">
                    <h1>Add Package Detail Form</h1>
                    <select name="package" id="package-country" required>
                    <option value="no-value" disabled selected>
                        Select a Package
                    </option>
                        <?Php
                            $go_query = mysqli_query($connection,"SELECT * FROM packages ORDER BY PKID DESC");
                            while($row = mysqli_fetch_array($go_query)){
                                $pkid = $row['PKID'];
                                $pkname = $row['PKName'];
                                echo "<option value={$pkid}>{$pkname}</option>";
                            } 
                        ?>
                    </select>
                    <select name="packageType" id="package-country" required>
                    <option value="no-value" disabled selected>
                        Select a Pitch Type
                    </option>
                        <?Php
                        $go_query = mysqli_query($connection, "SELECT * FROM packagetypes ORDER BY PKTID DESC");
                        while ($row = mysqli_fetch_array($go_query)) {
                            $pktid = $row['PKTID'];
                            $pktname = $row['PKTName'];
                            echo "<option value={$pktid}>{$pktname}</option>";
                        }
                        ?>
                    </select>
                    <label for="package-name">Price for One Person</label>
                    <input
                    type="text"
                    name="price"
                    id="package-name"
                    placeholder="Please Enter Price For One Person"
                    required
                    />
                    <label for="package-name">No Of People</label>
                    <input
                    type="text"
                    name="people"
                    id="package-name"
                    placeholder="Please Enter No of People"
                    required
                    />
                    <label for="package-name">Status</label>
                    <input
                    type="text"
                    name="status"
                    id="package-name"
                    placeholder="status"
                    required
                    />
                    <div class="add-package-type-form-btn-group">
                        <button class="add-package-type-form-btn" name="AddPickageDetail">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>