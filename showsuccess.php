<?php
session_start();
include('admin/connection.php');
$order_id = $_SESSION['orderid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>invoice</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./fontawesome/css/all.min.css" />
</head>

<body class="feature-body userbody">
    <div class="overall-overlay"></div>
    <!-- 
      NAVBAR
     -->
    <?php
    include('loginheader.php');
    ?>
    <!-- 
        Submit To Order
     -->
    <section class="booking" id="booking">
        <div class="booking-container">
            <h1 class="booking-title">INVOICE</h1>
            <div class="booking-and-recipe">
                <?php
                $query = "SELECT * FROM booking,users WHERE booking.BookingID='$order_id' AND booking.UserID=users.UserID";
                $go_query = mysqli_query($connection, $query);
                while($out = mysqli_fetch_array($go_query)){
                    $db_fname = $out['FirstName'];
                    $db_lname = $out['SurName'];
                    $db_email = $out['UEmail'];
                    $db_phone = $out['UPhoneNo'];
                }
                ?>
                <form class="booking-form">
                    <label for="username">Username</label>
                    <input type="text" disabled name="username" id="username"
                        value="<?php echo $db_fname . " " . $db_lname ?>" />
                    <label for="email">Email</label>
                    <input type="email" disabled name="email" id="email" value="<?php echo $db_email ?>" />
                    <label for="phone">Phone Number</label>
                    <input type="tel" disabled name="phone" id="phone" value="<?php echo $db_phone ?>" />
                    <a class="cart-confirm-btn invoicbtn" href="index.php">Finish Booking, Back to Home Page</a>
                </form>
                <div class="recipe">
                    <table class="recipe-table">
                        <thead>
                            <tr>
                                <th class="recipe-camp">Campsite</th>
                                <th class="recipe-guests">Guests</th>
                                <th class="recipe-cost">Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $total = 0;
                            $query = "SELECT bookdetail.*,packagedetail.*,packages.* FROM bookdetail LEFT JOIN packagedetail ON bookdetail.PDetailID=packagedetail.PDetailID LEFT JOIN packages ON packagedetail.PKID=packages.PKID WHERE bookdetail.BookingID='$order_id'";
                            $go_query = mysqli_query($connection, $query);
                            while($out = mysqli_fetch_array($go_query)){
                                $package_name = $out["PKName"];
                                $price = $out["Price"];
                                $noOfPeople = $out['BookPeople'];
                                $unit_price = $noOfPeople * $price;
                                $total += $unit_price;
                                echo"
                                <tr>
                                <td class='recipe-camp'>{$package_name}</td>
                                <td class='recipe-guests'>{$noOfPeople}</td>
                                <td class='recipe-cost'>{$unit_price}</td>
                            </tr>
                                ";
                            }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="total-cost">Total Cost</td>
                                <td class="total-price"><?php echo $total; ?></td>
                            </tr>
                        </tfoot>
                    </table>
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
                <a href="" class="footer-nav-item">Invoice</a>
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