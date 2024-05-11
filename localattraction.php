<?php
session_start();
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Local Attraction</title>
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
        LOCAL ATTRACTION
     -->
    <section class="local-attraction" id="local-attraction">
      <div class="local-attraction-container">
        <h1 class="local-attraction-title">Local Attractions</h1>
        <div class="local-attraction-cards-container">
          <div class="local-attraction-card-container">
            <?php
            $query = "SELECT * FROM country ORDER BY CountryID DESC";
            $go_query = mysqli_query($connection,$query);
            while($out = mysqli_fetch_array($go_query)){
                $cid = $out['CountryID'];
                $cName =$out['CountryName'];

                    echo "
                <p class='local-attraction-card-name'>
                    $cName
                </p>
                ";
            ?>
            <div class='local-attractions'>
            <?php
                $lquery = "SELECT * FROM localattr WHERE CountryID=$cid";
                $lgo_query = mysqli_query($connection,$lquery);
                while ($out = mysqli_fetch_array($lgo_query)) {
                    $countryId = $out['CountryID'];
                    $lName = $out['LocalAttrName'];
                    $lImage = $out['LocalImage'];

                    // echo $lName, $countryId .'<br>';
                    echo "
                        
                        <div class='local-attraction-site'>
                            <img
                            src='./photo/{$lImage}'
                            alt='local attraction site'
                            class='local-attraction-site-img'
                            />
                            <div class='local-attraction-site-overlay'></div>
                            <p class='local-attraction-site-name'>
                            The Tower Pole from the Trees and Handsome Man
                            </p>
                        </div>
                        
                    ";
                }
                ?>
                </div>
            <?php
            } 
            ?>
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
                <a href="" class="footer-nav-item">Local Attraction</a>
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