<?php
session_start();
include('admin/connection.php');

if (isset($_POST['submitchange'])) {
    global $connection;
    $user_id = $_POST['uid'];
    $f_name = $_POST['fname'];
    $s_name = $_POST['sname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phoneNo'];
    $profilep = $_FILES['ppphoto']['name'];

    $query = "UPDATE users set FirstName='$f_name', SurName='$s_name', Upassword='$password',Uemail='$email', UPhoneNo='$phone', Uphoto='$profilep' WHERE UserID='$user_id'";
    $go_query = mysqli_query($connection,$query);
    if (!$go_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }else{
        move_uploaded_file($_FILES['ppphoto']['tmp_name'],'photo/'.$profilep);
        // echo "<script>window.alert('successfully Update')</script>";
        header("location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account Setting</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./fontawesome/css/all.min.css" />
  </head>
  <body class="feature-body userbody">
    <div class="overall-overlay"></div>
    <!-- 
      NAVBAR
     -->
    <?php
    if(empty($_SESSION['user'])):
        include('header.php');
    ?>
    <?php else: ?>
        <?php
        include('loginheader.php');
        ?>
    <?php
    endif;
    ?>
    <!-- 
        ACCOUNT SETTING
     -->
    <?php
    $uid = $_GET['uid'];
    $query = "SELECT * FROM users WHERE UserID='$uid'";
    $go_query = mysqli_query($connection, $query);
    while($out = mysqli_fetch_array($go_query)){
        $user_id = $_GET['uid'];
        $db_fName = $out['FirstName'];
        $db_sName = $out['SurName'];
        $db_email = $out['UEmail'];
        $db_pass = $out['UPassword'];
        $db_phone = $out['UPhoneNo'];
        $profile = $out['UPhoto'];
    ?>
    <section class="account-setting" id="account-setting">
      <div class="account-setting-container">
        <div class="contact-box account-setting-form">
          <form method="POST" class="contact-us-form" enctype="multipart/form-data">

            <div class="form-group text-center" style="position: relative;" >
                <span class="img-div">
                    <div class="text-center img-placeholder"  onClick="triggerClick()">
                        <h4><i class="fa-solid fa-camera"></i></h4>
                    </div>
                            <?php
                                echo "<img src='photo/$profile' name='ppphoto' onClick='triggerClick()' id='profileDisplay'>";
                            ?>
                    <div>
                        
                    </div> 
                </span>
                <input type="file" name="ppphoto" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            </div>

            <h1 class="login-title">Account Setting</h1>
            <label for="username">First Name</label>
            <input
              type="text"
              name="fname"
              id="username" 
              value="<?php echo $db_fName ?>"
            />
            <label for="username">SurName</label>
            <input
              type="text"
              name="sname"
              id="username" 
              value="<?php echo $db_sName ?>" />
            <label for="email">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              value="<?php echo $db_email ?>"
            />
            <label for="password">Password</label>
            <input
              type="text"
              name="password"
              id="password"
              value="<?php echo $db_pass ?>"
            />
            <label for="phone">Phone No</label>
            <input
              type="text"
              name="phoneNo"
              id="phone"
              value="<?php echo $db_phone ?>" />
            <input type="text" hidden name="uid" value="<?php echo $user_id ?>">
            <button class="submit-btn" name="submitchange">Submit Changes</button>
            <!-- <a href="" class="submit-btn logout-btn">Logout</a> -->
          </form>
          <?php
    }
          ?>
          <img src="./assets/accSetting.svg" alt="" class="contact-img" />
        </div>
      </div>
    </section>
    <!-- Add Payment Method -->
    <!-- <section class="account-setting">
      <div class="account-setting-container">
        <div class="choose-payment-method">
          <p class="choose-payment-method-title">
            <i class="fa-solid fa-wallet payment-wallet-icon"></i>
            <span>Please Choose Your Payment Method</span>
          </p>
          <button
            class="choose-payment-method-btn submit-btn"
            id="paymentMethodBtn"
          >
            Add New Payment Method
          </button>
          <p class="payment-exclame-note">
            <i class="fa-solid fa-circle-exclamation payment-exclamation"></i>
            <span>You current do not have added any payment methods</span>
          </p>
        </div>
      </div>
    </section> -->

    <!-- <div class="popup-form-overlay" id="popupOverlay">
      <form class="payment-popup-form" id="popup-form">
        <div class="popup-form-header">
          <p>Adding New Payment</p>
          <a id="popup-form-cancel">
            <i class="fa-regular fa-circle-xmark" id="close-popup-form"></i>
          </a>
        </div>
        <div class="popup-form-inputs">
          <label for="payment-username">Name</label>
          <input
            type="text"
            name="payment-username"
            id="payment-username"
            placeholder="Enter Full Name"
          />
          <label for="payment-card-number"> Card Number </label>
          <div class="input-box">
            <input
              type="number"
              name="payment-card-number"
              id="payment-card-number"
              placeholder="XXXX XXXX XXXX"
            />
            <i class="fa-regular fa-credit-card"></i>
          </div>
          <div class="cvv-and-expiry-date">
            <div class="cvv">
              <label for="payment-cvv">CVV</label>
              <input
                type="number"
                name="payment-cvv"
                id="payment-cvv"
                placeholder="XXX"
              />
            </div>
            <div class="expiry-date">
              <label for="payment-expiry-date">Expiry Date</label>
              <input
                type="date"
                name="payment-expiry-date"
                id="payment-expiry-date"
                placeholder=" "
              />
            </div>
          </div>
        </div>
        <div class="popup-form-footer">
          <button class="popup-form-submit submit-btn">Submit</button>
        </div>
      </form>
    </div> -->
    <!-- 
      FOOTER
     -->
    <footer>
        <div class="footer-container">
            <div class="you-are-here">
                <h3 class="footer-logo">You are here</h3>
                <i class="fa-solid fa-chevron-right arr-right"></i>
                <a href="" class="footer-nav-item">Account Setting</a>
            </div>
            <div class="footer-info-container">
                <p class="copy-right">
                    &copy; 2023 Global Wild Swimming & Camping All rights reserved
                </p>
                <div class="footer-info-box">
                    <a href="" class="footer-icon-box">
                        <img src="./assets/icons/facebook.svg" class="footer-icon" alt="" />
                        Facebook
                    </a>
                    <a href="" class="footer-icon-box">
                        <img src="./assets/icons/twitter.svg" class="footer-icon" alt="" />
                        Twitter
                    </a>

                    <a href="" class="footer-icon-box">
                        <img src="./assets/icons/insta.svg" class="footer-icon" alt="" />
                        Instagram
                    </a>
                    <a href="" class="footer-icon-box">
                        <img src="./assets/icons/youtube.svg" class="footer-icon" alt="" />
                        Youtube
                    </a>
                    <a href="rssfeed.php" class="footer-icon-box">
                    <img
                        src="./assets/icons/rss-feed.svg"
                        class="footer-icon"
                        alt=""
                    />
                    Rss Feed
                    </a>
                    <!-- <a href="" > -->
                    <div class="footer-icon-box translatebox" id="google_element"></div>
                    <!-- </a> -->
                </div>
            </div>
        </div>
    </footer>
    <!-- google translate script -->
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
    <script>
        function loadGoogleTranslate(){
            new google.translate.TranslateElement("google_element");
        }
    </script>
    <script>
      const paymentMethodBtn = document.getElementById("paymentMethodBtn");
      const popupOverlay = document.getElementById("popupOverlay");
      const closePopup = document.getElementById("close-popup-form");
      const cancelPopup = document.getElementById("popup-form-cancel");

      paymentMethodBtn.addEventListener("click", (e) => {
        e.preventDefault();
        popupOverlay.classList.add("popup-active");
      });
      closePopup.addEventListener("click", (e) => {
        e.preventDefault();
        popupOverlay.classList.remove("popup-active");
      });
      cancelPopup.addEventListener("click", (e) => {
        e.preventDefault();
        popupOverlay.classList.remove("popup-active");
      });
    </script>
    <script src="./js/script.js"></script>
    <script src="./fontawesome/js/all.min.js"></script>
  </body>
</html>
