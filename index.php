<?php 
session_start();
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Global Wild Swimming and Camping</title>
    <!-- Custom Css Link -->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Fontawesome Css Link -->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css" />
</head>

<body class="userbody">
    <div class="overall-overlay"></div>

    <?php
    if (empty($_SESSION['user'])) :
        include('header.php');
    ?>  
    <?php else : ?>
        <?php
        include('loginheader.php');    
        ?>
    <?php 
endif; 
?>
    
    <!--
        HERO SECTION
     -->
    
    <section id="hero" class="hero">
        <div class="hero-container">
            <img src="./assets/img/hero-background-image.jpg" alt="hero-background-image" class="hero-image" />
            <div class="hero-overlay"></div>
            <div class="hero-text">
                <h1 class="hero-title">
                    Welcome to <br />
                    <b>Global Wild Swimming & Camping</b>
                </h1>
                <p class="hero-intro">
                    View our campgrounds from all over the world with the best
                    satisfaction rate from users
                </p>
                <form class="hero-search-form" action="search.php" method="POST">
                    <div class="hero-search-box">
                        <i class="fa fa-search search-icon"></i>
                        <input required type="text" name="searchword" class="hero-search-input" placeholder="Search for camps" />
                    </div>
                    <button name="search" class="search-btn">Search</button>
                </form>
            </div>
        </div>
    </section>

    <!-- 
        CHOOSE YOUR WAYS TO STAY   
     -->
    <section id="choose-your-ways-to-stay" class="choose-your-ways-to-stay">
        <div class="choose-your-ways-to-stay-container">
            <h1 class="choose-your-ways-to-stay-title">Choose Your Ways to Stay</h1>
            <div class="choose-your-ways-to-stay-cards">
                <!-- Cabins and Lodging Camping -->
                <?php
                $query = "SELECT * FROM packagetypes";
                $go_query = mysqli_query($connection, $query);
                while($out = mysqli_fetch_array($go_query)){
                    $typeid = $out['PKTID'];
                    $typename = $out['PKTName'];
                    $typeimg = $out['PKTImage'];

                    echo "
                        <a href='' class='choose-your-ways-to-stay-card'>
                        <img src='./photo/{$typeimg}' alt='lodging-camping' class='cyw-lodging-camping' />
                        <h3>{$typename}</h3>
                        <p>Find your comfort in your cabin or lodging</p>
                        </a>
                    ";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- 
      MOST POPULAR CAMPSITES ACROSS THE WORLD
     -->
    <section class="popular-campsites" id="popular-campsites">
        <div class="popular-campsites-container">
            <h1 class="popular-campsites-title">
                Most Popular Campsites Around the World
            </h1>
            <div class="popular-campsite-cards">
                <?php
                    $query = "SELECT packagedetail.*,packages.*,packagetypes.*,country.* FROM packagedetail,packages,packagetypes,country WHERE packagedetail.PKID=packages.PKID AND packagedetail.PKTID=packagetypes.PKTID AND packages.CountryID=country.CountryID AND packagedetail.View > 10 ORDER BY PDetailID DESC LIMIT 4";
                    $go_query = mysqli_query($connection, $query);
                    while($out = mysqli_fetch_array($go_query)){
                    $pdetailID = $out['PDetailID'];
                    $packageName = $out['PKName'];
                    $img = $out['Image1'];
                    $duration = $out['Duration'];
                    $PKTName = $out['PKTName'];
                    $country = $out['CountryName'];
                    $view = $out['View'];

                    echo'
                        <div class="popular-campsite-card">
                            <a href="" class="popular-campsite-img-container">
                                <img src="./photo/'.$img.'" alt="popular-campsite"
                                    class="popular-campsite-img" />
                            </a>
                            <div class="popular-campsite-info">
                                <a href="" class="popular-campsite-country">'. $country .'</a>
                                <a href="" class="popular-campsite-type">'.$PKTName.'</a>
                            </div>
                            <div class="popular-campsitetext">
                                <a href="" class="popular-campsite-name">'. $packageName .'</a>
                            </div>
                        </div>
                    ';
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- 
      FIND YOUR FAVORITE
     -->
    <section class="find-your-favorite" id="find-your-favorite">
        <div class="find-your-favorite-container">
            <div class="find-your-favorite-title-view-all">
                <h1 class="find-your-favorite-title">Find Your Favorite Campsites</h1>
                <a href="" class="find-your-favorite-view-all">View all</a>
            </div>
            <div class="popular-campsite-cards find-your-favorite-cards">
                <?php
                    $query = "SELECT packagedetail.*,packages.*,packagetypes.*,country.* FROM packagedetail,packages,packagetypes,country WHERE packagedetail.PKID=packages.PKID AND packagedetail.PKTID=packagetypes.PKTID AND packages.CountryID=country.CountryID ORDER BY PDetailID DESC LIMIT 8";
                    $go_query = mysqli_query($connection, $query);
                    while($out = mysqli_fetch_array($go_query)){
                    $pdetailID = $out['PDetailID'];
                    $packageName = $out['PKName'];
                    $img = $out['Image1'];
                    $duration = $out['Duration'];
                    $PKTName = $out['PKTName'];
                    $country = $out['CountryName'];
                    $view = $out['View'];

                    echo'
                        <div class="popular-campsite-card">
                            <a href="" class="popular-campsite-img-container">
                                <img src="./photo/'.$img.'" alt="popular-campsite"
                                    class="popular-campsite-img" />
                            </a>
                            <div class="popular-campsite-info">
                                <a href="" class="popular-campsite-country">'. $country .'</a>
                                <a href="" class="popular-campsite-type">'.$PKTName.'</a>
                            </div>
                            <div class="popular-campsitetext">
                                <a href="" class="popular-campsite-name">'. $packageName .'</a>
                            </div>
                        </div>
                    ';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- 
      TRUSTED BY COMPANY
     -->
    <section class="trusted-by-company" id="trusted-by-company">
        <div class="trusted-by-company-container">
            <h1 class="trusted-by-company-title">Trusted By</h1>
            <div class="slider-container">
                <img src="./assets/trusted-companies/alibaba.svg" class="trusted-company-img" alt="" />
                <img src="./assets/trusted-companies/amazon.svg" class="trusted-company-img" alt="" />
                <img src="./assets/trusted-companies/walmart.svg" class="trusted-company-img" alt="" />
                <img src="./assets/trusted-companies/paypal.svg" class="trusted-company-img" alt="" />
                <img src="./assets/trusted-companies/airkbz.png" class="trusted-company-img" alt="" />
                <img src="./assets/trusted-companies/goldenmyanmar.png" class="trusted-company-img" alt="" />
                <img src="./assets/trusted-companies/max.png" class="trusted-company-img" alt="" />
                <img src="./assets/trusted-companies/shwetaung.png" class="trusted-company-img" alt="" />
            </div>
            <button class="slide-previous">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="slide-next">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- 
      YOUTUBE VIDEO
     -->
    <div class="youtube-video">
        <div class="youtube-video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Fi56u3Z9V3s?si=MxtWdEheoDiNT6zR"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>

    <!-- 
      FOOTER
     -->
    <footer>
        <div class="footer-container">
            <div class="you-are-here">
                <h3 class="footer-logo">You are here</h3>
                <i class="fa-solid fa-chevron-right arr-right"></i>
                <a href="" class="footer-nav-item">Home</a>
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