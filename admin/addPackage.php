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
    <?php
    if(isset($_POST['admin_package'])){
        global $connection;
        $p_Name = $_POST['package_name'];
        $p_location = $_POST['package_location'];
        $p_s_date = $_POST['package_start_date'];
        $p_e_date = $_POST['package_end_date'];
        $duration = $_POST['package_duration'];
        $pimg1 = $_FILES['pimgone']['name'];
        $pimg2 = $_FILES['pimgtwo']['name'];
        $pimg3 = $_FILES['pimgthree']['name'];
        $desc = $_POST['package_description'];
        $p_country = $_POST['package_country'];

        if($p_Name != ""){
            $query = "SELECT * From packages WHERE PKName='$p_Name'";
            $p_query = mysqli_query($connection,$query);
            $count = mysqli_num_rows($p_query);
            if($count > 0){
                echo "<script>window.alert('already exits')</script>";
            }
            else{
                $query = "INSERT INTO packages (PKName,Location,StartDate,EndDate,Duration,Description,Image1,Image2,Image3,CountryID) VALUES('$p_Name','$p_location','$p_s_date','$p_e_date','$duration','$desc','$pimg1','$pimg2','$pimg3','$p_country')";
                $go_query = mysqli_query($connection,$query);
                if(!$go_query){
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                else{
                    move_uploaded_file($_FILES['pimgone']['tmp_name'], '../photo/' . $pimg1);
                    move_uploaded_file($_FILES['pimgtwo']['tmp_name'], '../photo/' . $pimg2);
                    move_uploaded_file($_FILES['pimgthree']['tmp_name'], '../photo/' . $pimg3);
                    echo "<script>window.alert('Package is successfully insert')</script>";
                    echo "<script>window.location.href='addpitchType.php'</script>";
                }
            }
        }
    }
    ?>
    <section class="dashboard-container">
        <?php
        include("header.php");
        ?>
        <!-- Right Side  -->
        <div class="dashboard-setting">
        <!-- Add Package Form -->
        <div class="add-package-form">
          <form method="POST" enctype="multipart/form-data">
            <h1>Add Package Form</h1>

            <label for="package-name">Package Name</label>
            <input
              type="text"
              name="package_name"
              id="package-name"
              placeholder="Enter package name"
              required
            />

            <label for="package-location">Package Location</label>
            <textarea
              name="package_location"
              id="package-location"
              cols="30"
              rows="4"
              placeholder="Enter package location Map"
              required
            ></textarea>

            <label for="package-start-date">Package Start Date</label>
            <input
              type="date"
              name="package_start_date"
              id="package-start-date"
              placeholder="Enter package start date"
              required
            />

            <label for="package-start-date">Package End Date</label>
            <input
              type="date"
              name="package_end_date"
              id="package-end-date"
              placeholder="Enter package end date"
              required
            />

            <label for="package-duration">Package Duration</label>
            <input
              type="text"
              name="package_duration"
              id="package-duration"
              placeholder="Enter package duration"
              required
            />

            <label for="package-image">Package Image One</label>
            <input type="file" name="pimgone" id="package-image" required/>

            <label for="package-image">Package Image Two</label>
            <input type="file" name="pimgtwo" id="package-image" required/>

            <label for="package-image">Package Image Three</label>
            <input type="file" name="pimgthree" id="package-image" required/>

            <label for="package-location">Description</label>
            <textarea
              name="package_description"
              id="package-location"
              cols="30"
              rows="4"
              placeholder="Enter Description for package"
              required
            ></textarea>

            <label for="package-country">Package Country</label>
            <select name="package_country" id="package-country" required>
                <option value="no-value" disabled selected>
                    Select a country
                </option>
                <?Php
                    $go_query = mysqli_query($connection,"SELECT * FROM country");
                    while($row = mysqli_fetch_array($go_query)){
                        $countryid = $row['CountryID'];
                        $countryname = $row['CountryName'];
                        echo "<option value={$countryid}>{$countryname}</option>";
                    } 
                ?>
            </select>

            <!-- <label for="package-view">Package View</label>
            <input
              type="number"
              name="package_view"
              id="package-view"
              placeholder="Enter package view"
              value="5"
              required
            /> -->
            <div class="admin-register-form-btn-group">
                <button name="admin_package" class="admin-register-btn">Add Package</button>
                <a href="package.php" class="see-admin-lists-link">See Package lists</a>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>