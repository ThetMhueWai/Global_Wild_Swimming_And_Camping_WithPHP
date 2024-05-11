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
        <div class="dashboard-setting">
        <!-- Dashboard Lists -->
        <div class="dashboard">
          <!-- Admin List -->
          <button class="number-of-admin">
            <a href="./setting.php">
              <i class="fa-solid fa-user-shield"></i>
                <p>Admin 
                <?php
                    $admincount = "SELECT count(AdminID) AS totalAdmin FROM admin";
                    $adminresult = mysqli_query($connection, $admincount);
                    $cvalues = mysqli_fetch_assoc($adminresult);
                    $num_rows = $cvalues['totalAdmin'];
                ?>
                <span><?php echo $num_rows ?></span></p>
            </a>
          </button>
          <!-- Feature -->
          <button class="number-of-admin">
            <a href="">
              <i class="fa-regular fa-square-plus"></i>
              <p>Features 
                <?php 
                    $featurecount = "SELECT count(FeatureID) AS totalfeatures FROM features";
                    $featureresult = mysqli_query($connection, $featurecount);
                    $cvalues = mysqli_fetch_assoc($featureresult);
                    $num_rows = $cvalues['totalfeatures'];
                ?> 
                <span><?php echo $num_rows ?></span></p>
            </a>
          </button>
          <!-- Country -->
          <button class="number-of-admin">
            <a href="">
              <i class="fa-solid fa-earth-americas"></i>
              <p>Country 
                <?php 
                $countrycount = "SELECT count(CountryID) AS totalcountry FROM country";
                $countryresult = mysqli_query($connection, $countrycount);
                $cvalues = mysqli_fetch_assoc($countryresult);
                $num_rows = $cvalues['totalcountry'];
                ?>
                <span><?php echo $num_rows ?></span>
            </p>
            </a>
          </button>
          <br />
          <!-- Country -->
          <button class="number-of-admin">
            <a href="">
              <i class="fa fa-star"></i>
                <p>Review 
                    <?php
                    $reviewcount = "SELECT count(ReviewID) AS totalReview FROM review";
                    $reviewresult = mysqli_query($connection, $reviewcount);
                    $cvalues = mysqli_fetch_assoc($reviewresult);
                    $num_rows = $cvalues['totalReview'];
                    ?>
                    <span><?php echo $num_rows ?></span>
                </p>
            </a>
          </button>
          <!-- Package Pitch -->
          <button class="number-of-admin">
            <a href="">
              <i class="fa-solid fa-cubes"></i>
                <p>Package 
                    <?php
                    $packagecount = "SELECT count(PDetailID) AS totalPackage FROM packagedetail";
                    $packageresult = mysqli_query($connection, $packagecount);
                    $cvalues = mysqli_fetch_assoc($packageresult);
                    $num_rows = $cvalues['totalPackage'];
                    ?>
                    <span><?php echo $num_rows ?></span>
                </p>
            </a>
          </button>
          <!-- Booking -->
          <button class="number-of-admin">
            <a href="">
                <i class="fa-solid fa-chart-simple"></i>
                <p>Booking 
                <?php
                $bookingcount = "SELECT count(BookingID) AS totalbooking FROM booking";
                $bookingresult = mysqli_query($connection, $bookingcount);
                $cvalues = mysqli_fetch_assoc($bookingresult);
                $num_rows = $cvalues['totalbooking'];
                ?>
                <span><?php echo $num_rows ?></span>
                </p>
            </a>
          </button>
          <br />
          <!-- Number of Users -->
          <button class="number-of-admin">
            <a href="">
              <i class="fa-solid fa-user"></i>
                <p>Users 
                <?php
                $usercount = "SELECT count(UserID) AS totalusers FROM users";
                $userresult = mysqli_query($connection, $usercount);
                $cvalues = mysqli_fetch_assoc($userresult);
                $num_rows = $cvalues['totalusers'];
                ?>
                <span><?php echo $num_rows ?></span>
                </p>
            </a>
          </button>
        </div>
      </div>
    </section>
    <!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>