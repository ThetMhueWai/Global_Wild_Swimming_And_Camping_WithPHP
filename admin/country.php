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
    if (isset($_POST['addCountry'])) {
        global $connection;
        $countryName = $_POST['country_name'];
        if ($countryName != "") {
            $query = "SELECT * FROM country WHERE CountryName='$countryName'";
            $ch_query = mysqli_query($connection,$query);
            $count = mysqli_num_rows($ch_query);
            if($count > 0){
                echo "<script>window.alert('already exists')</script>";
            }else{
                $query = "INSERT INTO country (CountryName) VALUES ('$countryName')";
                $go_query = mysqli_query($connection, $query);
                if (!$go_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }else{
                    echo "<script>window.alert('successfully inserted')</script>";
                    echo "<script>window.location.href='country.php'</script>";
                }
            }
        }
    } 
    ?>
    <?php
    if (isset($_POST['updateCountry'])) {
        global $connection;
        $country_name = $_POST['edit_country_name'];
        $country_id = $_GET['cid'];
        $query = "UPDATE country SET CountryName='$country_name' WHERE CountryID='$country_id'";
        $go_query = mysqli_query($connection,$query);
        echo "<script>window.location.href='country.php'</script>";
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
                <h1>Add Country Form</h1>
                <label for="country-name">Country Name</label>
                <input
                type="text"
                name="country_name"
                id="country-name"
                placeholder="Enter country name"
                required
                />

                <div class="add-country-form-btn-group">
                <button class="add-country-form-btn" name="addCountry">Add Country</button>
                </div>
            </form>
        </div>

        <!-- Edit Country Form -->
        <div class="edit-country-form">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'edit') {
                $cid = $_GET['cid'];
                $query = "SELECT * FROM country WHERE CountryID='$cid'";
                $go_query = mysqli_query($connection, $query);
                while ($out = mysqli_fetch_array($go_query)) {
                    $cName = $out['CountryName'];
            ?>    
            <form method="POST">
                <h1>Edit Country Form</h1>
                <label for="edit-country-name">Feautre Name</label>
                <input
                type="text"
                name="edit_country_name"
                id="edit-country-name"
                placeholder="Enter country name"
                value="<?php echo $cName ?>"
                required
                />

                <div class="edit-country-form-btn-group">
                <button class="edit-country-form-btn" name="updateCountry">Update</button>
                </div>
            </form>
            <?php
                }
            } 
            ?>
        </div>

        <!-- Country Lists -->
        <div class="dashboard-country-lists">
            <h1>Country Lists</h1>
            <table class="admin-table">
            <tr class="first-row">
                <th>ID</th>
                <th>Country Name</th>
                <th>Action</th>
            </tr>
            <?php
            $query = "SELECT * FROM country";
            $go_query = mysqli_query($connection,$query);
            while ($row = mysqli_fetch_array($go_query)) {
                $countryid = $row['CountryID'];
                $countryName = $row['CountryName'];

                echo "
                    <tr>
                    <td>{$countryid}</td>
                    <td>{$countryName}</td>
                    <td>
                    <button class='feature-list-edit-btn'>
                    <a href='country.php?action=edit&cid={$countryid}'>
                        <i class='bx bx-edit'></i>Edit
                    </a>
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