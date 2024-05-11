<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWSC</title>
</head>
<body> -->
<!-- 
      NAVBAR
     -->
    <header class="user-header login-stated">
      <nav>
        <a href="./index.php" class="nav-logo">
          <img src="./assets/logofinal.png" alt="">
        </a>
        

        <ul class="nav-menu" type="none">
          <li class="nav-toggle-lists">
            <a class="nav-item login nav-toggle"
              >Campsites
              <i class="fa-solid fa-chevron-down nav-toggle-down-arr"></i
            ></a>
            <ul type="none">
              <li>
                <a href="./all.php" class="nav-item nav-toggle-list"
                  >All Information</a
                >
              </li>
              <hr />
              <li>
                <a href="./available.php" class="nav-item nav-toggle-list"
                  >Pitch Type & Availability</a
                >
              </li>
              <hr />
              <li>
                <a
                  href="./localattraction.php"
                  class="nav-item nav-toggle-list"
                  >Local Attractions</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="./feature.php" class="nav-item login">Features</a>
          </li>
          <li>
            <a href="./review.php" class="nav-item login">Reviews</a>
          </li>
          <li>
            <a href="./contact.php" class="nav-item login">Contact</a>
          </li>

          <li>
            <a href="./cart.php" class="nav-item cart-nav"
              ><i class="fa-solid fa-cart-flatbed-suitcase"></i
            ></a>
          </li>
          <li>
            <?php
            if(!empty($_SESSION["user"])){
              $account = $_SESSION["user"];
              $query = "SELECT * FROM users WHERE UEmail='$account'";
              $go_query = mysqli_query($connection, $query);
              while($out = mysqli_fetch_array($go_query)){
                $db_fName = $out['FirstName'];
                $db_uid = $out['UserID'];
                $db_photo = $out['UPhoto'];
              }
            }
            ?>
            <a href="./accSetting.php?uid=<?php echo $db_uid ?>" class="nav-item nav-profile">
              <img src="photo/<?php echo $db_photo ?>" class="" alt="" />
              <?php
              echo $db_fName;
              ?>
            </a>
          </li>
            <li>
                <a href="logout.php" class="nav-item create-acc-btn">Logout</a>
            </li>
        </ul>
        <button class="menu-btn">
          <i class="fa-solid fa-bars menu"></i>
        </button>
      </nav>
    </header>
<!-- </body>
</html> -->