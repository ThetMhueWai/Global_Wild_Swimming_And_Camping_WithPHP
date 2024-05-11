<?php
session_start();
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Privacy Policy</title>
    <link rel="stylesheet" href="./css/style.css" />
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
        Privacy Policy
     -->
    <section class="privacy" id="privacy">
        <div class="privacy-container">
            <h1>RezPlot Systems, LLC d/b/a GWSC's Privacy Notice</h1>
            <p class="last-updated">Last Update: October 3, 2023</p>
            <hr />
            <p class="policy">
                At RezPlot Systems, LLC d/b/a GWSC (“GWSC”, “Company”, “we”, “our” or
                “us”), we value your trust and are constantly striving to provide
                excellent service to you, our customers and business partners, while
                building a long-lasting relationship with you. To achieve these goals,
                we collect and analyze information about you, your business, and the
                reservations and other transactions that are made using GWSC.
            </p>
            <p class="policy">
                We collect “Non-Personal Information” and “Personal Information” and
                the information we collect from you depends on how you use the
                Services. “Non-Personal Information” includes information that cannot
                be used to personally identify you, such as anonymous usage data,
                general demographic information we may collect, referring/exit pages
                and URLs, platform types, preferences you submit and preferences that
                are generated based on the data you submit and number of clicks.
                “Personal Information” means data that allows someone to identify or
                contact you, including, for example, your name, address, telephone
                number, email address, as well as any other non-public information
                about you that is associated with or linked to any of the foregoing
                data.
            </p>
            <p class="privacy-title">Information We Collect</p>
                <p class="privacy-sub-title">Personal Information</p>
                <p class="policy">
                When you make a reservation or get in touch with us, we might have a
                look at the personal data you give us, like your name, email address,
                contact number, and billing information.
                </p>
                <p class="privacy-sub-title">Usage Details</p>
                <p class="policy">
                In addition to your IP address, browser type, device information, and
                the pages you view, we also gather information on how you use our
                website and services. Additionally, we might use cookies and other
                tracking technologies to gather information.
            </p>
        </div>
    </section>
    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="you-are-here">
                <h3 class="footer-logo">You are here</h3>
                <i class="fa-solid fa-chevron-right arr-right"></i>
                <a href="" class="footer-nav-item">Privacy Policy</a>
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
    <script src="./js/script.js"></script>
    <script src="./fontawesome/js/all.min.js"></script>
</body>

</html>