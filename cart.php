<?php
session_start();
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Fontawesome Css Link -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
</head>

<body class="feature-body userbody">
    <div class="overall-overlay"></div>
    <?php
    include('loginheader.php');
    ?>
    <section class="cart" id="cart">
    <div class="cart-container">
        <h1 class="cart-title">Cart</h1>
        <?php if (!empty($_SESSION['cart'])): ?>
            <table class="cart-table">
                <thead>
                    <th class="cart-img">Image</th>
                    <th class="cart-camp">Campsite</th>
                    <th class="cart-cost">Guests</th>
                    <th class="cart-cost">Cost</th>
                    <th class="cart-cost">Total</th>
                </thead>
                <tbody>
                <?php
                    $total = 0;
                    foreach($_SESSION['cart'] as $pdid => $qty):
                    $query = "SELECT * FROM packagedetail,packages,packagetypes WHERE packagedetail.PDetailID=$pdid AND packagedetail.PKID=packages.PKID AND packagedetail.PKTID=packagetypes.PKTID";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    $total += $row['Price'] * $qty;
                ?>
                <tr>
                    <td class="cart-img">
                        <img src="./photo/<?php echo $row['Image2'] ?>"/>
                    </td>
                    <td class="cart-camp">
                        <p class='cart-camp-name'><?php echo $row['PKName'] ?></p>
                        <p class='cart-camp-type'>Type : <?php echo $row['PKTName'] ?></p>
                        <button class="delete-btn">
                            <a href="remove.php?id=<?php echo $pdid ?>">Delete</a>
                        </button>
                    </td>
                    <td class="cart-guests">
                        <div class="cart-guest-box">
                                      
                            <a href="increaseqty.php?id=<?php echo $pdid ?>" class="guest-increase">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                            <p class="no-of-guest"><?php echo $qty ?>
                            </p>
                            <a href="decreaseqty.php?id=<?php echo $pdid ?>" class="guest-decrease">
                                <i class="fa-solid fa-minus"></i>
                            </a>
                        </div>            
                    </td>
                    <td class="cart-cost">
                        $<?php echo $row['Price'] ?>
                    </td>
                    <td class="cart-cost">
                        $<?php echo $row['Price'] * $qty ?>
                    </td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td colspan="2">
                    <?php
                        if (!empty($_SESSION['user'])) {
                            $user_email = $_SESSION['user'];
                            $query = "SELECT * FROM users WHERE UEmail='$user_email'";
                            $go_query = mysqli_query($connection, $query);
                            while ($out = mysqli_fetch_array($go_query)) {
                                $user_id = $out['UserID'];
                                $user_fname = $out['FirstName'];
                                $user_lname = $out['SurName'];
                                $email = $out['UEmail'];
                                $phone = $out['UPhoneNo'];
                                $address = $out['UAddress'];
                            }
                        }
                    ?>
                        <form class="booking-form" method="post" action="submitorder.php">
                            <input type="text" hidden name="username" id="username" value="<?php echo $user_fname . " " . $user_lname ?>" />
                            <input type="email" hidden name="email" id="email" value="<?php echo $email ?>" />
                            <input type="tel" hidden name="phone" id="phone" value="<?php echo $phone ?>" />
                            <input type="text" hidden name="userid" value="<?php echo $user_id ?>" />
                            <!-- <select name="payment_type" id="payment-methods" class="payment-methods">
                                <option value="" disabled selected class="payment-methods-selected">
                                Payment Method
                                </option>
                                <option value="">1234 2345 3456</option>
                                <option value="">1234 2345 3456</option>
                                <option value="">1234 2345 3456</option>
                            </select> -->
                            <input type="text" required name="paymentcard" placeholder="Credit Card Number" />
                        </td>
                        <td colspan="3" align="right">
                            <b>Total:</b> $<?php echo $total; ?>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="panel-footer">
                <button class="cart-confirm-btn" class="btn btn-success">
                    Submit Order!
                </button>
                </form>
                <a class="cart-confirm-btn" href="clear.php" class="btn btn-danger">
                    Clear Cart
                </a>
                <a class="cart-confirm-btn" href="all.php" class="btn btn-default">
                    Back
                </a>
            </div>
        </div>
                            
                        
    <?php else: ?>
        <div class="cart-null-state">
            <img src="./assets/empty-cart.svg" class="empty-cart-img" alt="">
            <p class="empty-cart-text">No Packages in the Cart</p>
            <a href="./all.php" class="empty-cart-link">Search for more package here</a>
        </div>
    <?php endif; ?>
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
                <a href="" class="footer-nav-item">Cart</a>
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