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
          if (isset($_POST['update_admin_package'])) {
            global $connection;
          
          }
        ?>
        <!-- Right Side  -->
        <div class="dashboard-setting">
        <!-- Package Links Box -->
        <div class="package-links-box">
            <a href="./addPackage.php">Add Package</a>
            <a href="./addPitchtype.php">Add PitchType</a>
            <a href="./addPackageDetail.php">Add Package Detail</a>
        </div>
        <!-- Edit Package Detail -->
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'edit') {
          $id = $_GET['id'];
          $query = "SELECT * FROM packagedetail,packages,packagetypes WHERE packagedetail.PKID=packages.PKID AND packagedetail.PKTID=packagetypes.PKTID AND packagedetail.PDetailID='$id'";
          $go_query = mysqli_query($connection,$query);
          while($out = mysqli_fetch_array($go_query)){
            // $id = $_Get['id'];
            $pkid = $out['PKID'];
            $pktid = $out['PKTID'];
            $price = $out['Price'];
            $noOfPeople = $out['NoOfPeople'];
            $status = $out['Status'];
            
            ?>
            <!-- <div class="add-package-type-form"> -->
                <form method="POST" enctype="multipart/form-data">
                    <h1>Edit Package Detail Form</h1>
                    <select name="package" id="package-country" required>
                    <?php
                        $go_query = mysqli_query($connection, "SELECT * FROM packages WHERE PKID='$pkid'");
                        $data = mysqli_fetch_row($go_query);
                    ?>
                    <option value="<?php echo $pkid ?>">
                        <?php echo $data[1] ?>
                    </option>
                    <?Php
                      $go_query = mysqli_query($connection, "SELECT * FROM packages EXCEPT SELECT * FROM packages WHERE PKID='$pkid'");
                      while ($row = mysqli_fetch_array($go_query)) {
                        $pkid = $row['PKID'];
                        $pkname = $row['PKName'];
                        echo "<option value={$pkid}>{$pkname}</option>";
                      }
                      ?>
                    </select>

                    <select name="packageType" id="package-country" required>
                        <?php
                            $go_query = mysqli_query($connection, "SELECT * FROM packagetypes WHERE PKTID='$pktid'");
                            $pdata = mysqli_fetch_row($go_query);
                        ?>
                        <option value="<?php echo $pktid ?>">
                            <?php echo $pdata[1] ?>
                        </option>
                        <?Php
                        $go_query = mysqli_query($connection, "SELECT * FROM packagetypes EXCEPT SELECT * FROM packagetypes WHERE PKTID='$pktid'");
                        while ($row = mysqli_fetch_array($go_query)) {
                            $pktid = $row['PKTID'];
                            $pktname = $row['PKTName'];
                            echo "<option value={$pktid}>{$pktname}</option>";
                        }
                      ?>
                    </select>
                    <label for="package-name">Price for One Person</label>
                    <input type="text" name="price" id="package-name" placeholder="Please Enter Price For One Person" required />
                    <label for="package-name">No Of People</label>
                    <input type="text" name="people" id="package-name" placeholder="Please Enter No of People" required />
                    <label for="package-name">Status</label>
                    <input type="text" name="status" id="package-name" placeholder="status" required />
                    <div class="add-package-type-form-btn-group">
                      <button class="add-package-type-form-btn" name="AddPickageDetail">Update Data</button>
                    </div>
                  </form>
                <!-- </div> -->
                <?php
          }
        }
        ?>
        <!-- Package Lists -->
        <div class="dashboard-package-lists">
          <h1>Package Lists</h1>
          <table class="admin-table">
            <tr class="first-row">
              <th>ID</th>
              <th>Name</th>
              <th>Date</th>
              <th>PK Type</th>
              <th>Country</th>
              <th>View</th>
              <th>Action</th>
            </tr>
            <?php
            $query = "SELECT packagedetail.*,packages.*,packagetypes.*,country.* FROM packagedetail,packages,packagetypes,country WHERE packagedetail.PKID=packages.PKID AND packagedetail.PKTID=packagetypes.PKTID AND packages.CountryID=country.CountryID ORDER BY PDetailID DESC";
            $go_query = mysqli_query($connection, $query);
            while($out = mysqli_fetch_array($go_query)){
              $pdetailID = $out['PDetailID'];
              $packageName = $out['PKName'];
              $startDate = $out['StartDate'];
              $endDate = $out['EndDate'];
              $PKTName = $out['PKTName'];
              $country = $out['CountryName'];
              $view = $out['View'];
                echo "<tr>
                <td>{$pdetailID}</td>
                <td class='package-name'>";
                echo substr("{$packageName}", 0, 24) . '....';
                echo "</td>
                <td>{$startDate}<br>
                <span class='spanto'>to</span>
                <br>{$endDate}</td>
                <td>{$PKTName}</td>
                <td>{$country}</td>
                <td>{$view}</td>
                <td>
                <button class='feature-list-edit-btn'>
                  <a href='package.php?action=edit&id={$pdetailID}'><i class='fa-regular fa-pen-to-square'></i>Edit</a>
                </button>
                <button class='feature-list-delete-btn'>
                  <a href='deletepdetail.php?id={$pdetailID}'><i class='fa-regular fa-trash-can'></i>delete</a>
                </button>
              </td>
              </tr>";
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