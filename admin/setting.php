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
        <!-- Right Side - Setting -->
        <div class="dashboard-setting">
        <!-- Admin Lists -->
        <div class="admin-lists-btn-group">
          <button class="create-new-admin-btn">
            <a href="addAdmin.php">
                <i class="bx bx-plus-circle" style="color: #000"></i>
                Create new admin
            </a>
          </button>
          <button class="edit-my-account-information-btn">
            <?php
            if (!empty($_SESSION["admin"])) {
                $profile = $_SESSION["admin"];
                $query = "select * from admin where AEmail='$profile'";
                $go_query = mysqli_query($connection, $query);
                while ($out = mysqli_fetch_array($go_query)) {
                    $db_name = $out['AdminName'];
                    $db_adminid = $out['AdminID'];     
                    // echo $db_adminid;
                    
                }
            } else {
                $_SESSION["user"] = "";
            }
            ?>
            
            <a href="updateAdmin.php?action=edit&id=<?php echo $db_adminid ?>">
                <i class="bx bx-edit" style="color: #000"></i>
                Edit my account information
            </a>
          </button>
        </div>
        <div class="dashboard-admin-lists">
          <h1>Admin Lists</h1>
          <table class="admin-table">
            <tr class="first-row">
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone Number</th>
            </tr>
            <?php
            $query = "SELECT * FROM admin ORDER BY AdminID DESC";
            $go_query = mysqli_query($connection, $query);
            while ($out = mysqli_fetch_array($go_query)) {
                $adminid = $out['AdminID'];
                $adminname = $out['AdminName'];
                $adminEmail = $out['AEmail'];
                $AdminAddr = $out['AAddress'];
                $Adminphone = $out['APhoneNo'];
            
                echo "
                <tr>
                    <td>{$adminid}</td>
                    <td>{$adminname}</td>
                    <td>{$adminEmail}</td>
                    <td>{$AdminAddr}</td>
                    <td>{$Adminphone}</td>
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