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
    if (isset($_POST['addfeature'])) {
        global $connection;
        $feature_name = $_POST['featurename'];
        $fphoto = $_FILES['fphoto']['name'];
        if ($feature_name != "") {
            $query = "SELECT * FROM features WHERE FeatureName='$feature_name'";
            $fe_query = mysqli_query($connection,$query);
            $count = mysqli_num_rows($fe_query);
            if($count > 0){
                echo "<script>window.alert('already exists')</script>";
            }else{
                $query = "INSERT INTO features (FeatureName,FImage) VALUES ('$feature_name','$fphoto')";
                $go_query = mysqli_query($connection,$query);
                if (!$go_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                else{
                    move_uploaded_file($_FILES['fphoto']['tmp_name'],'../photo/'.$fphoto);
                    echo "<script>window.alert('Features is successfully insert')</script>";
                    echo "<script>window.location.href='addPkFeatures.php'</script>";
                }
            }
        }
    } 
    ?>
    <?php
    if (isset($_POST['editFeature'])) {
        global $connection;
        $f_name = $_POST['edit_feature_name'];
        $f_id = $_GET['f_id'];
        $f_image = $_FILES['edit_feature_image']['name'];

        if(!$f_image){
            $query = "UPDATE features SET FeatureName='$f_name' WHERE FeatureID='$f_id'";
        }else{
            $query = "UPDATE features SET FeatureName='$f_name',FImage='$f_image' WHERE FeatureID='$f_id'";
        }
        $go_query = mysqli_query($connection,$query);
        if(!$go_query){
            die("QUEYR FAILED" . mysqli_error($connection));
        }else{
            move_uploaded_file($_FILES['edit_feature_image']['tmp_name'], '../photo/' . $f_image);
            echo "<script>window.location.href='feature.php'</script>";
        }
    } 
    ?>
    <section class="dashboard-container">
        <?php
        include("header.php");
        ?>
        <!-- Right Side - Setting -->
        <div class="dashboard-setting">
        <!-- Add Feature Form -->
        <div class="add-feature-form">
            <form method="POST" enctype="multipart/form-data">
                <h1>Add Feature Form</h1>
                <label for="feature-name">Feautre Name</label>
                <input
                type="text"
                name="featurename"
                id="feature-name"
                placeholder="Enter feature name"
                required
                />

                <label for="feature-image">Feature Image</label>
                <input type="file" required name="fphoto" id="feature-image" />

                <div class="add-feature-form-btn-group">
                    <button class="add-feature-form-btn" name="addfeature">
                        Add Feature
                    </button>
                </div>
            </form>
        </div>

        <!-- Edit Feature Form -->
        <div class="edit-feature-form">
        <?php
        if(isset($_GET['action']) && $_GET['action'] == 'edit') {
            $feature_id = $_GET['f_id'];
            $query = "SELECT * FROM features WHERE FeatureID='$feature_id'";
            $go_query = mysqli_query($connection, $query);
            while ($out = mysqli_fetch_array($go_query)) {
                $db_featureID = $out['FeatureID'];
                $db_featureName = $out['FeatureName'];
                $db_fimage = $out['FImage'];
        ?>
        
        <form method="POST" enctype="multipart/form-data">
            <h1>Edit Feature Form</h1>
            <label for="edit-feature-name">Feautre Name</label>
            <input
              type="text"
              name="edit_feature_name"
              id="edit-feature-name"
              value="<?php echo $db_featureName ?>"
              placeholder="Enter feature name"
            />

            <label for="edit-feature-image">Feature Image</label>
            <input
              type="file"
              name="edit_feature_image"
              id="edit-feature-image"
            />

            <div class="edit-feature-form-btn-group">
                <button class="edit-feature-form-btn" name="editFeature">Update</button>
            </div>
          </form>
        <?php 
            } 
        }
        ?>
        </div>

        <!-- Feature Lists -->
        <div class="dashboard-feature-lists">
            <h1>Feature Lists</h1>
            <table class="admin-table">
                <tr class="first-row">
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <?php
                $query = "SELECT * FROM features ORDER BY FeatureID DESC";
                $go_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($go_query)) {
                    $db_featureID = $row['FeatureID'];
                    $db_featureName = $row['FeatureName'];
                    $db_fimage = $row['FImage'];

                    echo "
                    <tr>
                    <td>{$db_featureName}</td>
                    <td>
                        <img
                        class='feature-list-img'
                        src='../photo/{$db_fimage}'
                        alt='feature image'
                        />
                    </td>

                    <td>
                        <button class='feature-list-edit-btn'>
                        <a href='addnewfeature.php?action=edit&f_id={$db_featureID}'><i class='bx bx-edit'></i>Edit</a>
                        </button>
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