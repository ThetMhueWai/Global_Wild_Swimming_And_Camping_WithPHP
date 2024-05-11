<?php
session_start();
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Features</title>
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
        FEATURES
     -->
    <section class="features" id="features">
        <div class="features-container">
            <div class="js-slide-box">
                <p class="features-slide active-slide">Features</p>
                <p class="wearables-slide">Wearables</p>
            </div>
            <h1 class="features-title">Features that We Offering</h1>
            <div class="feature-cards">
                <?php
                $query = "SELECT * FROM features ORDER BY FeatureID DESC";
                $go_query = mysqli_query($connection, $query);
                while ($out = mysqli_fetch_array($go_query)) {
                    $fName = $out['FeatureName'];
                    $fimg = $out['FImage'];

                    echo"
                        <div class='feature-card'>
                            <img src='./photo/{$fimg}' alt='' class='feautre-img' />
                            <p>{$fName}</p>
                        </div>
                    ";
                }
                ?>
            </div>
            <div class="wearable-technology-container">
          <div class="wearable-technology-box">
            <div class="wearable-technology">
              <img src="./assets/smart-watch.svg" alt="" />
              <p>Smartwatches</p>
            </div>
            <div class="wearable-technology">
              <img src="./assets/fitness-tracker.svg" alt="" />
              <p>Fitness Trackers</p>
            </div>
            <div class="wearable-technology">
              <img src="./assets/virtual.svg" alt="" />
              <p>Virtual and augmented reality headsets</p>
            </div>
            <div class="wearable-technology">
              <img src="./assets/smart-clothing.svg" alt="" />
              <p>Smart Clothing</p>
            </div>
            <div class="wearable-technology">
              <img src="./assets/smart-jewlery.svg" alt="" />
              <p>Smart Jewelry</p>
            </div>
            <div class="wearable-technology">
              <img src="./assets/headphones.svg" alt="" />
              <p>Headphones</p>
            </div>
            <div class="wearable-technology">
              <img src="./assets/smart-eyewears.svg" alt="" />
              <p>Smart Eyewears</p>
            </div>
            <div class="wearable-technology">
              <img src="./assets/medical-wearable.svg" alt="" />
              <p>Medical Wearable</p>
            </div>
          </div>
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
                <a href="" class="footer-nav-item">Feature and Wearable</a>
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
    <!-- Fontawesome Js Link -->
    <script src="./fontawesome/js/all.min.js"></script>
    <script>
      const featureSlide = document.querySelector(".features-slide");
      const wearableSlide = document.querySelector(".wearables-slide");
      const featureCards = document.querySelector(".feature-cards");
      const wearableTech = document.querySelector(".wearable-technology-box");
      const featureTitle = document.querySelector(".features-title");

      wearableTech.style.display = "none";
      wearableSlide.addEventListener("click", () => {
        wearableSlide.classList.toggle("active-slide");
        featureSlide.classList.toggle("active-slide");
        wearableTech.style.display = "flex";
        featureCards.style.display = "none";
        featureTitle.innerText = "Wearable Technologies";
      });
      featureSlide.addEventListener("click", () => {
        wearableSlide.classList.toggle("active-slide");
        featureSlide.classList.toggle("active-slide");
        wearableTech.style.display = "none";
        featureCards.style.display = "flex";
        featureTitle.innerText = "Features that We Offering";
      });
    </script>
</body>

</html>