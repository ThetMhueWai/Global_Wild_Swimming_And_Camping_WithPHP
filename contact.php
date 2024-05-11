<?php
session_start();
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <!-- Css Custom Link -->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Fontawesome Link -->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css" />
</head>

<body class="feature-body userbody">
    <div class="overall-overlay"></div>
    <!-- 
      NAVBAR
     -->
    <?php
    if (empty($_SESSION['user'])):
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
        Contact Us
     -->
    <?php
    if(isset($_POST['contactsubmit'])){
        global $connection;
        $userid =  $_POST['uid'];
        $message = $_POST['message'];
        $query = "INSERT INTO contact(UserID,Message) VALUES ('$userid','$message')";
        $go_query = mysqli_query($connection, $query);
        if (!$go_query) {
            die("QUERY FAILED" . mysqli_query($connection,$query));
        }
        echo "<script>window.alert('Successfully send yor message for admin team')</script>";
        echo "<script>window.location.href='contact.php'</script>";
    }
    ?>
    <section class="contact-us" id="contact-us">
        <div class="contact-us-container">
            <h1 class="contact-us-title">Contact Us</h1>
            <div class="contact-box">
                <?php
                if (!empty($_SESSION["user"])) {
                    $account = $_SESSION["user"];
                    $query = "SELECT * FROM users WHERE UEmail='$account'";
                    $go_query = mysqli_query($connection, $query);
                    while ($out = mysqli_fetch_array($go_query)) {
                        $db_fName = $out['FirstName'];
                        $db_lnName = $out['SurName'];
                        $db_email = $out['UEmail'];
                        $db_uid = $out['UserID'];
                        $db_photo = $out['UPhoto'];
                    }
                }
                ?>
                <form action="" method="POST" class="contact-us-form">
                    <label for="username">Username</label>
                    <input type="text" value="<?php echo $db_fName ." ". $db_lnName?>" disabled name="username" id="username" placeholder="Please enter your username" />
                    <label for="email">Email</label>
                    <input type="text" value="<?php echo $db_email ?>" disabled name="email" id="email" placeholder="Please enter your email" />
                    <input type="text" name="uid" hidden value="<?php echo $db_uid ?>">
                    <label for="comment">Message for Admin Team</label>
                    <textarea name="message" id="comment" cols="30" rows="4"
                        placeholder="Please enter your comment"></textarea>
                    <div class="form-bottom">
                        <button class="submit-btn" name="contactsubmit">Submit</button>
                        <a href="./privacy.php" class="see-privacy-policy">See our privacy policy</a>
                    </div>
                </form>
                <img src="./assets/contact-img.svg" alt="" class="contact-img" />
            </div>
        </div>
    </section>
    <!-- 
      FOOTER
     -->
    <footer>
        <div class="footer-container">
            <div class="you-are-here">
                <h3 class="footer-logo">You are here</h3>
                <i class="fa-solid fa-chevron-right arr-right"></i>
                <a href="" class="footer-nav-item">Contact</a>
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

    <!-- Custom Js Link -->
    <script src="./js/script.js"></script>
    <!-- Fontawesome Link -->
    <script src="./fontawesome/js/all.min.js"></script>
</body>

</html>