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
    if(isset($_POST['addlocalattrbtn'])){
        global $connection;
        $contryName = $_POST['local_attraction_country'];
        $attrName = $_POST['local_attr_name'];
        $localimgone = $_FILES['local_att_imageone']['name'];

        if ($attrName != "") {
            $query = mysqli_query($connection, "SELECT * FROM localattr WHERE LocalAttrName='$attrName'");
            $count = mysqli_num_rows($query);
            if ($count > 0) {
                echo "<script>window.alert('This Local Attraction Name is already exists')</script>";
            } else {
                $query = "INSERT INTO localattr (CountryID,LocalAttrName,LocalImage) VALUES ('$contryName','$attrName','$localimgone')";
                $ch_query = mysqli_query($connection, $query);
                if (!$ch_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                } else {
                    move_uploaded_file($_FILES['local_att_imageone']['tmp_name'], '../photo/' . $localimgone);
                    echo "<script>window.alert('local attriction is successfully inserted')</script>";
                    echo "<script>window.location.href='localAttr.php'</script>";
                }
            }
        }
    }
    ?>
    <section class="dashboard-container">
        <?php
        include("header.php");
        ?>
        <!-- Right Side - Setting -->
        <div class="dashboard-setting">
            <!-- Add Country Form -->
            <div class="add-country-form">
            <form method="POST" enctype="multipart/form-data">
                <h1>Add Local Attraction Form</h1>
                <label for="local-attraction-country">
                    Local Attraction Country
                </label>
                <select name="local_attraction_country" id="local-attraction-country">
                    <option value="no-value" disabled selected>
                        Select a country
                    </option>
                    <?php
                        $go_query = mysqli_query($connection,"SELECT * FROM country");
                        while($row = mysqli_fetch_array($go_query)){
                            $countryid = $row['CountryID'];
                            $countryname = $row['CountryName'];
                            echo "<option value={$countryid}>{$countryname}</option>";
                        } 
                    ?>
                </select>
                <label for="local-attraction-name">
                    Local Attraction Name
                </label>
                <input
                type="text"
                name="local_attr_name"
                id="local-attraction-name"
                placeholder="Enter local attraction name"
                required
                />

                <label for="local-attraction-image">
                    Local Attraction Image One
                </label>
                <input
                type="file"
                name="local_att_imageone"
                id="local-attraction-image"
                required
                />

                <div class="add-local-attraction-form-btn-group">
                <button class="add-local-attraction-form-btn" name="addlocalattrbtn">
                    Add Local Attraction
                </button>
                </div>
            </form>
            </div>

            <!-- Local Attraction Lists -->
            <div class="dashboard-country-lists">
                <h1>Local Attraction Lists</h1>
                <table class="admin-table">
                    <tr class="first-row">
                        <th>ID</th>
                        <th>Country</th>
                        <th>Attraction List</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM localattr,country WHERE localattr.CountryID=country.CountryID";
                    $go_query = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_array($go_query)) {
                        $localattrID = $row['LocalAttrID'];
                        $localAttrName = $row['LocalAttrName'];
                        $countryName = $row['CountryName'];
                        $countryID = $row['CountryID'];
                        echo "
                        <tr>
                        <td>{$localattrID}</td>
                        <td>{$countryName}</td>
                        <td>{$localAttrName}</td>
                        <td>
                        <button class='feature-list-edit-btn'>
                        <a href='editlocalAttr.php?action=edit&lid={$localattrID}&cid={$countryID}'>
                            <i class='fa-regular fa-pen-to-square'></i>Edit
                        </a>
                        </button>
                        <button class='feature-list-delete-btn'>
                        <a href='deletelocalattr.php?id={$localattrID}'><i class='fa-regular fa-trash-can'></i>Delete</a>
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