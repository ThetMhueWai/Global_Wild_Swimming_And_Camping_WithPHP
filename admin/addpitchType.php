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
        if (isset($_POST['AddPitchType'])) {
            global $connection;
            $ptName = $_POST['pt_name'];
            $ptimg = $_FILES['ptimg']['name'];
            if($ptName != "" && $ptimg != ""){
                $query = "SELECT * FROM packagetypes WHERE PKTName = '$ptName'";
                $go_query = mysqli_query($connection, $query);
                $count = mysqli_num_rows($go_query);
                if ($count > 0) {
                    echo "<script>window.alert('already exits')</script>";
                }else{
                    $query = "INSERT INTO packagetypes (PKTName,PKTImage) VALUES ('$ptName','$ptimg')";
                    $ch_query = mysqli_query($connection, $query);
                    if (!$ch_query) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }else{
                        move_uploaded_file($_FILES['ptimg']['tmp_name'], '../photo/'.$ptimg);
                        echo "<script>window.alert('successfully inserted')</script>";
                    }
                }
            }
        }
        ?>
        <?php
        if (isset($_POST['editpitchType'])) {
            global $connection;
            $ptName = $_POST['pktname'];
            $ptid = $_GET['pkt_id'];
            $ptImg = $_FILES['pkimg']['name'];
            if (!$ptImg) {
                $query = "UPDATE packagetypes SET PKTName='$ptName' WHERE PKTID ='$ptid'";
            }else{
                $query = "UPDATE packagetypes SET PKTName='$ptName', PKTImage='$ptImg' WHERE PKTID ='$ptid'";                
            }
            $go_query = mysqli_query($connection, $query);
            if (!$go_query) {
                die("QUEYR FAILED" . mysqli_error($connection));
            }
            else{
                move_uploaded_file($_FILES['pkimg']['tmp_name'], '../photo/' . $ptImg);
                echo "<script>window.location.href='addpitchType.php'</script>";
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
                <h1>Add Pitch Type Form</h1>
                <label for="package-type-name">Package Type Name</label>
                <input
                    type="text"
                    name="pt_name"
                    id="package-type-name"
                    placeholder="Enter package type name"
                    required
                />
                <input
                    type="file"
                    name="ptimg"
                    id="package-type-name"
                    required
                />
    
                <div class="add-package-type-form-btn-group">
                    <button class="add-package-type-form-btn" name="AddPitchType">Add</button>
                </div>
            </form>
          </div>
    
          <!-- Edit Pitch Type Form -->
            <div class="edit-package-type-form">
            <?php 
            if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            $pkt_id = $_GET['pkt_id'];
            $query = "SELECT * FROM packagetypes WHERE PKTID='$pkt_id'";
            $go_query = mysqli_query($connection,$query);
            while($out = mysqli_fetch_array($go_query)){
                $db_pktID = $out['PKTID'];
                $db_pktName = $out['PKTName'];
                $db_pktimg = $out['PKTImage'];
            ?>
            <form method="POST" enctype="multipart/form-data">
                <h1>Edit Pitch Type Form</h1>
                <label for="edit-package-type-name">Package Type Name</label>
                <input
                    type="text"
                    name="pktname"
                    id="edit-package-type-name"
                    value="<?php echo $db_pktName ?>"
                    placeholder="Enter package type name"
                />
                <input
                    type="file"
                    name="pkimg"
                    id="edit-package-type-name"
                    value="<?php echo $db_pktimg ?>"
                />
    
                <div class="edit-package-type-form-btn-group">
                    <button class="edit-package-type-form-btn" name="editpitchType">Update</button>
                </div>
            </form>
            <?php
                }
            } 
            ?>
          </div>
    
          <!-- Pitch Type Lists -->
          <div class="dashboard-package-type-lists">
            <h1>Pitch Type Lists</h1>
            <table class="admin-table">
                <tr class="first-row">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                <?php
                $query = "SELECT * FROM packagetypes ORDER BY PKTID DESC";
                $go_query = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_array($go_query)) {
                    $db_pktID = $row['PKTID'];
                    $db_pktName = $row['PKTName'];

                    echo "
                    <tr>
                    <td>{$db_pktID}</td>
                    <td>{$db_pktName}</td>
                    <td>
                    <button class='feature-list-edit-btn'>
                        <a href='addpitchType.php?action=edit&pkt_id={$db_pktID}'>
                        <i class='fa-regular fa-pen-to-square'></i>Edit</a>
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