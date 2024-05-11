<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location: index.php");
}
include "connection.php";

?>
<?php
if (isset($_POST['updateLocal'])) {
    global $connection;
    $id = $_GET['lid'];
    $country = $_POST['edit_country'];
    $localattrName = $_POST['localattrName'];
    $localimg1 = $_FILES['localimg1']['name'];

    if(!$localimg1){
        $query = "UPDATE localattr SET CountryID='$country',LocalAttrID='$id',";
        $query .= "LocalAttrName='$localattrName' WHERE LocalAttrID='$id'";
    }else {
        $query = "UPDATE localattr SET CountryID='$country',LocalAttrID='$id',";
        $query .= "LocalAttrName='$localattrName',LocalImage='$localimg1' WHERE LocalAttrID='$id'";
    }
    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUEYR FAILED" . mysqli_error($connection));
    } else {
        move_uploaded_file($_FILES['localimg1']['tmp_name'], '../photo/' . $localimg1);
        echo "<script>window.location.href='localAttr.php'</script>";
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

<body class="adminbody">
    <section class="dashboard-container">
        <?php
        include("header.php");

        if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            $lid = $_GET['lid'];
            $cid = $_GET['cid'];
            $query = "SELECT * FROM localattr WHERE LocalAttrID='$lid'";
            $go_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($go_query)) {
                $localID = $row['LocalAttrID'];
                $cid = $_GET['cid'];
                $localName = $row['LocalAttrName'];
                $locamimg1 = $row['LocalImage'];
            }
        }

        ?>
        <!-- Right Side - Setting -->
        <div class="dashboard-setting">
            <!-- Edit Country Form -->
            <div class="edit-country-form">
                <form method="POST" enctype="multipart/form-data">
                    <h1>Edit Local Attraction Form</h1>
                    <label for="edit-local-attraction-country">
                        Local Attraction Country
                    </label>
                    <select name="edit_country" id="edit-local-attraction-country">
                        <?php
                        $go_query = mysqli_query($connection, "SELECT * FROM country WHERE CountryID='$cid'");
                        $data = mysqli_fetch_row($go_query); 
                        ?>
                        <option value="<?php echo $cid ?>"><?php echo $data[1] ?></option>
                        <?php
                        $go_query = mysqli_query($connection, "SELECT * FROM country EXCEPT SELECT * FROM country WHERE CountryID='$cid'");
                        while ($row = mysqli_fetch_array($go_query)) {
                            $c_id = $row['CountryID'];
                            $c_name = $row['CountryName'];
                            echo "<option value='$c_id'>{$c_name}</option>";
                        } 
                        ?>
                    </select>

                    <label for="edit-local-attraction-name">
                        Local Attraction Name
                    </label>
                    <input type="text" name="localattrName" value="<?php echo $localName ?>" 
                    id="edit-local-attraction-name" placeholder="Enter local attraction name" />
                    
                    <label for="edit-local-attraction-image">
                        Local Attraction Image One
                    </label>
                    <input type="file" name="localimg1" id="edit-local-attraction-image" />

                    <div class="edit-local-attraction-form-btn-group">
                        <button class="edit-local-attraction-form-btn" name="updateLocal">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>