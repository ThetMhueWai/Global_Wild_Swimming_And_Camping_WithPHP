<?php
session_start();
include('admin/connection.php');
if (isset($_POST['booking'])){
    $pkdid = $_POST['pkDetail'];
    $uid = $_POST['uid'];
    $price = $_POST['price'];
    // if ($uid != "") {
        global $connection;
        $query = "INSERT INTO bookdetail(UserID,PDetailID,BookingPeople,TotalPrice)";
        $query .= "VALUES('$uid','$pkdid',1,'$price')";
        $go_query=mysqli_query($connection, $query);
        if(!$go_query){
            die("QUERY FAILED" . mysqli_error($connection));
        }else{
            echo "<script>window.location.href='addtocart.php?id=$pkdid'</script>";
        }
    // }
}

if (isset($_POST['submitreview'])) {
    global $connection;
    $rate = $_POST['rate'];
    $comment = $_POST['comment'];
    $pdetail = $_POST['pdetail'];
    $uid = $_POST['uid'];
    if (!$rate) {
        $query = "INSERT INTO review(UserID,PDetailID,ReviewText,Star) VALUES('$uid','$pdetail','$comment',0)";
        $go_query = mysqli_query($connection, $query);
        if (!$go_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            echo "<script>window.alert('successfully inserted')</script>";
            header("location:review.php");
        }
    }else{
        $query = "INSERT INTO review(UserID,PDetailID,ReviewText,Star) VALUES('$uid','$pdetail','$comment','$rate')";
        $go_query=mysqli_query($connection,$query);   
                if(!$go_query)
                {    
                    die("QUERY FAILED".mysqli_error($connection));    
                }    
                else
                { 
                    echo "<script>window.alert('successfully inserted')</script>";
                    header("location:review.php");    
                } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Campsite</title>
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
        CAMPSITE
     -->
    <section class="campsite" id="campsite">
        <?php
        $id = $_GET['id'];
        $query = "SELECT View FROM packagedetail WHERE PDetailID='$id'";
        $go_query = mysqli_query($connection,$query);
        while ($out = mysqli_fetch_assoc($go_query)) {
            $view = $out['View'];
            $newview = $view + 1;
            $new = "UPDATE packagedetail SET View='$newview' WHERE PDetailID='$id'";
            if ($connection->query($new) === TRUE) {
                echo "";
            }
        }

        $result = mysqli_query($connection,"SELECT packagedetail.*,packages.*,packagetypes.*,country.*,packagefeature.*,features.* FROM packagedetail,packages,packagetypes,country,packagefeature,features WHERE packagedetail.PKID=packages.PKID AND packagedetail.PKTID=packagetypes.PKTID AND packages.CountryID=country.CountryID AND packagefeature.FeatureID=features.FeatureID AND packagedetail.PDetailID=$id");
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="campsite-container">
            <h1 class="campsite-name"><?php echo $row['PKName'] ?> | <small><?php echo $row['CountryName'] ?></small> | <small class='temp'></small></h1>
            <div class="campsite-country-and-reviews">
                <p class="campsite-type"><?php echo $row['StartDate'] ?> to <?php echo $row['EndDate'] ?></p>
            </div>
            <div class="campsite-country-and-reviews">
                <p class="campsite-type"><?php echo $row['PKTName'] ?></p>
                <div class="campsite-review-stars">
                    <i class="fa-solid fa-star star-reivew"></i>
                    5
                </div>
            </div>
            <div class="campsite-img-container">
                <div class="campsite-img">
                    <img src="photo/<?php echo $row['Image2'] ?>" alt="" class="" />
                </div>
                <div class="campsite-img-2">
                    <div class="campsite-img-2-box">
                    <img src="photo/<?php echo $row['Image1'] ?>" alt="" class="" />
                    </div>
                    <div class="campsite-img-2-box">
                    <img src="photo/<?php echo $row['Image3'] ?>" alt="" class="" />
                    </div>
                </div>
            </div>
            <div class="info-and-features">
                <div class="campsite-about">
                    <h3 class="campsite-about-title">About</h3>
                    <p class="campsite-about-info">
                        <?php echo $row['Description'] ?>
                    </p>
                </div>
                <div class="campsite-features">
                    <?php
                    $fquery = "SELECT packagedetail.*,packagefeature.*,features.* 
                    FROM packagedetail,packagefeature,features WHERE packagedetail.PDetailID=$id And packagefeature.FeatureID=features.FeatureID AND packagedetail.PKID=packagefeature.PKID";
                    $go_query = mysqli_query($connection,$fquery);
                    while ($out = mysqli_fetch_array($go_query)) {
                        $fname = $out['FeatureName'];
                        $fimg = $out['FImage'];
                        echo "
                        <div class='campsite-feature'>
                        <img src='./photo/{$fimg}' alt='' class='campsite-feature-img'/>
                        <p>{$fname}</p>
                    </div>
                        ";
                    }
                    ?>
                </div>
            </div>
            <div class="local-attraction-and-location">
                <div class="campsite-local-attraction">
                    <h3 class="campsite-local-attraction-title">Local Attraction</h3>
                    <div class="campsite-local-attraction-box">
                        <?php
                        $lquery = "SELECT localattr.*,packages.*,packagedetail.* FROM localattr,packages,packagedetail WHERE packagedetail.PDetailID=$id And packagedetail.PKID=packages.PKID And packages.CountryID=localattr.CountryID LIMIT 6";
                        $go_query = mysqli_query($connection,$lquery);
                        while ($out = mysqli_fetch_array($go_query)) {
                            $lid = $out['LocalAttrID'];
                            $lname = $out['LocalAttrName'];
                            $limg = $out['LocalImage'];
                            echo "
                            <div class='campsite-local-attraction-card'>
                            <div class='la-img-container'>
                                <img src='./photo/{$limg}' alt='' />
                            </div>
                            <p>{$lname}</p>
                        </div>
                        ";
                    } 
                        ?>
                    </div>
                </div>
                <div class="campsite-location">
                    <iframe
                        src="<?php echo $row['Location'] ?>"
                        allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="book-now">
                <?php
                if (!empty($_SESSION["user"])) {
                    $bookbtn = "
                    <form class='comment-form' method='POST'>
                    <input type='text' name='pkDetail' value='${id}' hidden/>";
                    $pemail = $_SESSION["user"];

                    $query = "SELECT * FROM users WHERE UEmail='$pemail'";
                    $go_query = mysqli_query($connection, $query);
                    while($out = mysqli_fetch_array($go_query)){
                        $db_userid = $out['UserID'];
                        
                    }
                    $bookbtn .= "<input type='text' name='uid' value='${db_userid}' hidden/>";
                    $price = $row['Price'];
                    $bookbtn .= "<input type='text' name='price' value='${price}' hidden/>";
                    // $bookbtn .= "<button class='book-now-btn' name='booking'>Book Now</button>";
                    $bookbtn .= '<a href="addtocart.php?pdid=' . $id . '" class="book-now-btn">
                        Book Now</a></p>';
                    $bookbtn .= "</form>";
                    echo $bookbtn;
                } else{
                    $bookbtn = "<a href='login.php' class='book-now-btn'>Please Login for booking</a>";
                    echo $bookbtn;
                }
                ?>
            </div>
            <div class="comment-box">
                <?php
                if (!empty($_SESSION['user'])) {
                    $pemail = $_SESSION["user"];
                    $query = "SELECT * FROM users WHERE UEmail='$pemail'";
                    $go_query = mysqli_query($connection, $query);
                    while ($out = mysqli_fetch_array($go_query)) {
                        $db_userid = $out['UserID'];
                        $db_fname = $out['FirstName'];
                        $db_sName = $out['SurName'];
                    }
                    ?>
                    <form class="review_form" method="POST">
                    <h3 class="comment-form-title">Leave A Comment</h3>
                    <input type="text" name="pdetail" hidden value="<?php echo $id ?>">
                    <input type="text" name="uid" hidden value="<?php echo $db_userid ?>">
                        <div class="star_container">
                            <div class="star_widget">
                                <input type="radio" name="rate" value="5" id="rate-5">
                                <label for="rate-5">
                                    <i class="fas fa-star"></i>
                                </label>
                                <input type="radio" name="rate" value="4" id="rate-4">
                                <label for="rate-4">
                                    <i class="fas fa-star"></i>
                                </label>
                                <input type="radio" name="rate" value="3" id="rate-3">
                                <label for="rate-3">
                                    <i class="fas fa-star"></i>
                                </label>
                                <input type="radio" name="rate" value="2" id="rate-2">
                                <label for="rate-2">
                                    <i class="fas fa-star"></i>
                                </label>
                                <input type="radio" name="rate" value="1" id="rate-1">
                                <label for="rate-1">
                                    <i class="fas fa-star"></i>
                                </label>
                            </div>
                        </div>
                        <p class="comment_cart_name"><?php echo $db_fname . $db_sName ?></p>
                        <textarea required name="comment" id="comment" cols="30" rows="4"
                            placeholder="Please enter your comment"></textarea>
                        <button class="submit-btn" name="submitreview">Submit</button>
                    </form>
                <?php
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
                <a href="" class="footer-nav-item">Campsite Detail</a>
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
    <!-- 
        JS Link
      -->
    <script>
    const apiKey = "432855548b763768132a1d227fbcf6b0";
    const apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=<?php echo $row['CountryName'] ?>";
            async function checkWeather(){
                const response = await fetch(`${apiUrl}&appid=${apiKey}`);
                var data = await response.json();

                console.log(data);

                // document.querySelector(".city").innerHTML = data.name;
                document.querySelector(".temp").innerHTML = Math.round(data.main.temp - 273.15)  + " °C";
            }
            checkWeather();
    </script>
    <script src="./js/script.js"></script>
    <script src="./fontawesome/js/all.min.js"></script>
</body>

</html>