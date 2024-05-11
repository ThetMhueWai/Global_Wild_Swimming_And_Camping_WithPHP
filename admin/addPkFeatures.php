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
        if (isset($_POST['AddPkFeatures'])) {
            global $connection;
            $fID = $_POST['feature'];
            $pkID = $_POST['package'];
            
            if ($fID != "" && $pkID != "") {
                $query = "INSERT INTO packagefeature (FeatureID,PKID) VALUES('$fID','$pkID')";
                $go_query = mysqli_query($connection, $query);
                if (!$go_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                } else {
                    echo "<script>window.alert('Package Feature is successfully insert')</script>";
                    echo "<script>window.location.href='feature.php'</script>";
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
                    <h1>Add Package Feature Form</h1>
                    <select name="package" id="package-country" required>
                        <option value="no-value" disabled selected>
                            Select a Package
                        </option>
                        <?Php
                        $go_query = mysqli_query($connection, "SELECT * FROM packages ORDER BY PKID DESC");
                        while ($row = mysqli_fetch_array($go_query)) {
                            $pkid = $row['PKID'];
                            $pkname = $row['PKName'];
                            echo "<option value={$pkid}>{$pkname}</option>";
                        }
                        ?>
                    </select>
                    <select name="feature" id="package-country" required>
                        <option value="no-value" disabled selected>
                            Select a Feature
                        </option>
                        <?Php
                        $go_query = mysqli_query($connection, "SELECT * FROM features ORDER BY FeatureID DESC");
                        while ($row = mysqli_fetch_array($go_query)) {
                            $featureID = $row['FeatureID'];
                            $featureName = $row['FeatureName'];
                            echo "<option value={$featureID}>{$featureName}</option>";
                        }
                        ?>
                    </select>
                    <div class="add-package-type-form-btn-group">
                        <button class="add-package-type-form-btn" name="AddPkFeatures">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>