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
        include("header.php");
        ?>
        <?php
        if (isset($_POST['UpdatePkFeatures'])) {
            global $connection;
            $fID = $_POST['feature'];
            $pkID = $_POST['package'];
            $pkfid = $_GET['pkf_id'];

            if ($fID != "" && $pkID != "") {
                $query = "UPDATE packagefeature SET FeatureID='$fID',PKID='$pkID' WHERE PKFID='$pkfid'";
                $go_query = mysqli_query($connection,$query);
                if (!$go_query) {
                    die("QUEYR FAILED" . mysqli_error($connection));
                }else{
                    echo "<script>window.location.href='feature.php'</script>";
                }
            }
        }
        ?>
        <!-- Right Side - Setting -->
        <div class="dashboard-setting">
            <!-- Feature Links Box -->
            <div class="package-links-box">
                <a href="./addPkFeatures.php">Add Package Features</a>
                <a href="./addnewfeature.php">Add New Features</a>
            </div>
            <?php
                if (isset($_GET['action']) && $_GET['action'] == 'edit') {
                    $pkfid = $_GET['pkf_id'];
                    // SELECT features.*,packages.*,packagefeature.* FROM features,packages,packagefeature WHERE features.FeatureID=packagefeature.FeatureID AND packages.PKID=packagefeature.PKID ORDER BY PKFID DESC
                    $query = "SELECT features.*,packages.*,packagefeature.* FROM features,packages,packagefeature WHERE features.FeatureID=packagefeature.FeatureID AND packages.PKID=packagefeature.PKID AND PKFID='$pkfid' ORDER BY PKFID DESC";
                    $go_query = mysqli_query($connection,$query);
                    while ($out = mysqli_fetch_array($go_query)) {
                       
                        $db_pkfid = $out['PKFID'];
                        $fName = $out['FeatureName'];
                        $packageName = $out['PKName'];
                        $pkid = $out['PKID'];
                        $fid = $out['FeatureID'];
                        ?>

                        <div class="add-package-type-form">
                        <form method="POST" enctype="multipart/form-data">
                        <h1>Add Package Feature Form</h1>
                        <select name="package" id="package-country" required>
                        <?Php
                            $go_query = mysqli_query($connection, "SELECT * FROM packages WHERE PKID='$pkid'");
                            $row = mysqli_fetch_array($go_query);
                        ?>
                        <option value="<?php echo $pkid ?>"><?php echo $row[1] ?></option>
                        <?php
                        $go_query = mysqli_query($connection, "SELECT * FROM packages EXCEPT SELECT * FROM packages WHERE PKID='$pkid'");
                        while ($row = mysqli_fetch_array($go_query)) {
                                    $pkid = $row['PKID'];
                                    $pkname = $row['PKName'];
                                    echo "<option value='$pkid'>{$pkname}</option>";
                        }
                        ?>
                        </select>
                        <select name="feature" id="package-country" required>
                        <?php
                            $go_query = mysqli_query($connection, "SELECT * FROM features WHERE FeatureID='$fid'");
                            $row = mysqli_fetch_array($go_query);
                        ?>
                        <option value="<?php echo $fid ?>">
                            <?php echo $row[1] ?>
                        </option>
                        <?Php
                        $go_query = mysqli_query($connection, "SELECT * FROM features EXCEPT SELECT * FROM features WHERE FeatureID='$fid'");
                        while ($row = mysqli_fetch_array($go_query)) {
                            $featureID = $row['FeatureID'];
                            $featureName = $row['FeatureName'];
                            echo "<option value='$featureID'>{$featureName}</option>";
                        }
                    ?>
                                        </select>
                                        <div class="add-package-type-form-btn-group">
                                            <button class="add-package-type-form-btn" name="UpdatePkFeatures">Update</button>
                                        </div>
                                    </form>
                                </div>
                        <?php
                    }
                }
            ?>
            <!-- Package Feature Lists -->
            <div class="dashboard-feature-lists">
                <h1>Feature Lists</h1>
                <table class="admin-table">
                    <tr class="first-row">
                        <td>ID</td>
                        <th>Package Name</th>
                        <th>Feature Name</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    // $query = "SELECT * FROM packagefeature ORDER BY PKFID DESC";
                    $query = "SELECT features.*,packages.*,packagefeature.* FROM features,packages,packagefeature WHERE features.FeatureID=packagefeature.FeatureID AND packages.PKID=packagefeature.PKID ORDER BY PKFID DESC";
                    $go_query = mysqli_query($connection, $query);
                    while ($out = mysqli_fetch_array($go_query)) {
                        $db_pkfid = $out['PKFID'];
                        $fName = $out['FeatureName'];
                        $packageName = $out['PKName'];

                        echo "
                    <tr>
                    <td>{$db_pkfid}</td>
                    <td>{$packageName}</td>
                    <td>{$fName}</td>
                    <td>
                        <button class='feature-list-edit-btn'>
                        <a href='feature.php?action=edit&pkf_id={$db_pkfid}'><i class='fa-regular fa-pen-to-square'></i>Edit</a>
                        </button>
                        <button class='feature-list-delete-btn'>
                        <a href='deletefeature.php?id={$db_pkfid}'><i class='fa-regular fa-trash-can'></i>Delete</a>
                        </button>
                    </td>
                    </td>
                    </tr>
                    ";
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