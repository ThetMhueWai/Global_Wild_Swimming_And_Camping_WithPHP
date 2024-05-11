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
        <!-- Right Side  -->
        <div class="dashboard-setting">
            <!-- Edit Package Form -->
            <div class="edit-package-form">
                <form>
                    <h1>Edit Package Form</h1>

                    <label for="package-name">Package Name</label>
                    <input type="text" name="package-name" id="package-name" placeholder="Enter package name" />

                    <label for="package-location">Package Location</label>
                    <textarea name="package-location" id="package-location" cols="30" rows="4"
                        placeholder="Enter package location"></textarea>

                    <label for="package-start-date">Package Start Date</label>
                    <input type="date" name="package-start-date" id="package-start-date"
                        placeholder="Enter package start date" />

                    <label for="package-start-date">Package End Date</label>
                    <input type="date" name="package-end-date" id="package-end-date"
                        placeholder="Enter package end date" />

                    <label for="package-duration">Package Duration</label>
                    <input type="text" name="package-duration" id="package-duration"
                        placeholder="Enter package duration" />

                    <label for="package-image">Package Image One</label>
                    <input type="file" name="package-image" id="package-image" />

                    <label for="package-image">Package Image Two</label>
                    <input type="file" name="package-image" id="package-image" />

                    <label for="package-image">Package Image Three</label>
                    <input type="file" name="package-image" id="package-image" />

                    <label for="package-image">Package Image Four</label>
                    <input type="file" name="package-image" id="package-image" />

                    <label for="package-country">Package Country</label>
                    <select name="package-country" id="package-country">
                        <option value="no-value" disabled selected>
                            Select a country
                        </option>
                        <option value="mm">Myanmar</option>
                        <option value="sg">Singapore</option>
                        <option value="en">England</option>
                    </select>

                    <label for="package-view">Package View</label>
                    <input type="number" name="package-view" id="package-view" placeholder="Enter package view"
                        value="5" />

                    <div class="edit-package-form-btn-group">
                        <button class="edit-package-form-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Fontawesome Js Link -->
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>