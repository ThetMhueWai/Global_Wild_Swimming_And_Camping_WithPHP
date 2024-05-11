<?php
session_start();
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reviews</title>
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
        REVIEW
     -->
    <section class="reviews" id="reviews">
        <div class="reviews-container">
            <h1 class="reviews-title">Reviews from Our Customers</h1>
            <div class="review-cards">
                <?php
                $query = "SELECT * FROM review,users,packagedetail,packages,country WHERE review.UserID=users.UserID AND review.PDetailID=packagedetail.PDetailID AND packagedetail.PKID=packages.PKID AND packages.CountryID=country.CountryID ORDER BY ReviewID DESC";
                $go_query = mysqli_query($connection,$query);
                while($out = mysqli_fetch_array($go_query)){
                    $pkName = $out['PKName'];
                    $cName = $out['CountryName'];
                    $rate = $out['Star'];
                    $comment = $out['ReviewText'];
                    $reDate = $out['RDate'];
                    $fName = $out['FirstName'];
                    $sName = $out['SurName'];
                    $profile = $out['UPhoto'];

                    echo '
                        <div class="review-card">
                    <div class="review-avatar-box">
                        <img src="./photo/'.$profile.'" alt="" />
                        <div class="review-avatar-info">
                            <p class="avatar-name">'. $fName .' '.$sName.'</p>
                            <p class="date">'.$reDate.'</p>
                        </div>
                    </div>
                    <div class="review-stars">
                        ';
                        if ($rate == 1) {
                            echo '
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-regular fa-star star-reivew"></i>
                            <i class="fa-regular fa-star star-reivew"></i>
                            <i class="fa-regular fa-star star-reivew"></i>
                            <i class="fa-regular fa-star star-reivew"></i>
                            ';
                        }elseif ($rate == 2) {
                            echo'
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-regular fa-star star-reivew"></i>
                            <i class="fa-regular fa-star star-reivew"></i>
                            <i class="fa-regular fa-star star-reivew"></i>
                            ';
                        }elseif ($rate == 3) {
                            echo'
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-regular fa-star star-reivew"></i>
                            <i class="fa-regular fa-star star-reivew"></i>
                            ';
                        }elseif ($rate == 4) {
                            echo '
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-regular fa-star star-reivew"></i>
                            ';
                        }elseif ($rate == 5) {
                        echo '
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-solid fa-star star-reivew"></i>
                            <i class="fa-solid fa-star star-reivew"></i>
                            ';
                        }
                    echo '
                    </div>
                    <div class="camping-site-box">
                        <span class="camping-site-name"> '.$pkName.' </span>
                        |
                        <span class="camping-site-country"> '.$cName.' </span>
                    </div>
                    <div class="camping-site-review">
                        <p>
                            '.$comment.'
                        </p>
                    </div>
                </div>
                    ';
                } 
                ?>
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
                <a href="" class="footer-nav-item">Review</a>
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
</body>

</html>