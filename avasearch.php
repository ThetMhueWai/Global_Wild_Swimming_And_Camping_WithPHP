<?php
session_start();
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Information</title>
    <!-- Css Custom Link -->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Fontawesome Css Link -->
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
        All Information
     -->
    <section class="all-information" id="all-information">
        <div class="all-information-container">
            <h1 class="all-information-title">Search Campsites from GWSC</h1>
            <form class="info-search-box" action="avasearch.php" method="POST">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="info-search" class="id-search" placeholder="Search" />
                </div>
                <!-- <select name="selectcountry id="info-country-select" class="info-country-select">
                    <option value="" selected disabled>Select A Country</option>
                    <?Php
                    // $go_query = mysqli_query($connection, "SELECT * FROM country");
                    // while ($row = mysqli_fetch_array($go_query)) {
                    //     $countryid = $row['CountryID'];
                    //     $countryname = $row['CountryName'];
                    //     echo "<option value={$countryid}>{$countryname}</option>";
                    // }
                    ?>
                </select> -->
                <button name="avapgsearch" class="info-search-link">Search</button>
            </form>
            <div class="all-cards">

                <?php

                if (isset($_POST['avapgsearch'])) {
                    global $connection;
                    $data = $_POST['search'];
                    $query = "SELECT packagedetail.*,packages.*,packagetypes.*,country.* FROM packagedetail,packages,packagetypes,country WHERE packagedetail.PKID=packages.PKID AND packagedetail.PKTID=packagetypes.PKTID AND packages.CountryID=country.CountryID AND packages.PKName LIKE '%$data%' AND packagedetail.Status='Available' ORDER BY PDetailID DESC";
                    $go_query = mysqli_query($connection, $query);
                    $count_result = mysqli_num_rows($go_query);
                    if ($count_result == 0) {
                        echo "<p>Sorry No Result Found</p>";
                    } elseif ($count_result > 0) {
                        while ($out = mysqli_fetch_array($go_query)) {
                            $pdetailID = $out['PDetailID'];
                            $pkID = $out['PKID'];
                            $pkTID = $out['PKTID'];
                            $price = $out['Price'];
                            $noOfPeople = $out['NoOfPeople'];
                            $status = $out['Status'];
                            $view = $out['View'];
                            $duration = $out['Duration'];
                            if ($status == "Available") {
                                echo '
                                    <a href="./detail.php?id=' . $pdetailID . '" class="all-card">
                                        <img src="./assets/img/popular-campsite-3.jpg" alt="" class="all-card-img" />
                                        <div class="name-and-views">
                                            <p class="all-card-name">Kan Daw Gyi Park</p>
                                            <p class="all-card-views">
                                                <i class="fa-regular fa-eye"></i>
                                                ' . $view . '
                                            </p>
                                        </div>
                                        <div class="country-and-type">
                                            <p class="all-card-country">Duration - ' . $duration . '</p>
                                        </div>
                                        <div class="country-and-type">
                                            <p class="all-card-country">Myanmar</p>
                                            <p class="all-card-type">RV Camping</p>
                                        </div>
                                        <div class="star-rate-and-price">
                                            <div class="price">
                                                <p><b>$40</b>/night</p>
                                            </div>
                                        </div>
                                    </a>
                                ';
                                } else {
                                    echo '
                                    <a href="./camping.html" class="all-card unavailable">
                                        <img src="./assets/img/popular-campsite-3.jpg" alt="" class="all-card-img" />
                                        <div class="name-and-views">
                                            <p class="all-card-name">Kan Daw Gyi Park</p>
                                            <p class="all-card-views">
                                                <i class="fa-regular fa-eye"></i>
                                                ' . $view . '
                                            </p>
                                        </div>
                                        <div class="country-and-type">
                                            <p class="all-card-country">Duration - 3days</p>
                                        </div>
                                        <div class="country-and-type">
                                            <p class="all-card-country">Myanmar</p>
                                            <p class="all-card-type">RV Camping</p>
                                        </div>
                                        <div class="star-rate-and-price">
                                            <div class="price">
                                                <p><b>$40</b>/night</p>
                                            </div>
                                        </div>
                                    </a>
                                    ';
                                }
                            }
                        }
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
                <a href="" class="footer-nav-item">Search</a>
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
    <!-- Js Custom Link -->
    <script src="./js/script.js"></script>
    <!-- Fontawesome Js Link -->
    <script src="./fontawesome/js/all.min.js"></script>
</body>

</html>