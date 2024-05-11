<?php
session_start();
// error_reporting(E_ALL ^ E_NOTICE);
include('admin/connection.php');

if (isset($_POST['userbtnlogin'])) {
    global $connection;

    $uEmail = $_POST['useremail'];
    $upassword = $_POST['userpassword'];
    
    $query = "SELECT * FROM `users` WHERE `UEmail`='$uEmail' AND `UPassword`='$upassword'";
    $go_query = mysqli_query($connection, $query);
    if (mysqli_num_rows($go_query) > 0) {
        session_start();
        $_SESSION['user'] = $uEmail;
        header("location:index.php");
    } else {
        // $msg = "Round User and Password";
        // header("location:login.php");
        
        $_SESSION['u'] += 1;
        $msg= "You Enter " . $_SESSION['u'] . " Time Wrong Email and Password";
        // echo "<br><a href='index.php'>Try Again</a>";
        if ($_SESSION['u'] > 2) {
            header('location:time.php');
        }
    }
}

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
    <!-- RECAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="feature-body userbody">
    <?php
    if(isset($_COOKIE['user']))
{
        $_SESSION['u'] = 0;
?>
	<meta http-equiv="refresh" content="600">
<?php
    echo "<div class='block-user-page' style='color: white;
    padding: 20px;
    font-size: 2.5em;
    background-color: rgb(250, 123, 33);
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction:column;'><b>Block User</b><br>"; 
    echo $_COOKIE['user'];
    echo "</div>";
    echo "<p id='countdown' style='text-align:center; position:absolute; left: 50%; bottom: 150px; transform: translateX(-50%); color:white;'></p>";
}
else
{
    ?>
    <div class="overall-overlay"></div>
    <?php
    include('header.php');
    ?>
    <!-- 
        Login
     -->
    <section class="contact-us" id="contact-us">
        <div class="contact-us-container">
            <div class="contact-box login-box">
                <form action="" method="post" class="contact-us-form">
                    <h1 class="login-title">Login</h1>

                    <label for="email">Email</label>
                    <input type="text" name="useremail" id="email" placeholder="Please enter your email" required/>
                    <label for="password">Password</label>
                    <input type="password" name="userpassword" id="password" placeholder="Please enter your password" required/>
                    <div class="g-recaptcha" data-sitekey="6LdYzRYoAAAAACvYP78QI9Pd3YwEi50pNMjyXvZ4" data-callback="recaptchaCallback"></div>
                    <p class="errors">

                        <?php 
                        // if (!empty($msg)){echo $msg;}
                        ?>
                        <?php if (!empty($msg)) {
                                echo "<p class='errors'>" . $msg . "</p>";
                        } ?>
                    </p>
                    <div class="form-bottom">
                        <button class="submit-btn" name="userbtnlogin">Login</button>
                        <a href="./createAcc.php" class="see-privacy-policy">Create a account</a>
                    </div>
                </form>
                <img src="./assets/login.svg" alt="" class="contact-img" />
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
                <a href="" class="footer-nav-item">Login</a>
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
        function loadGoogleTranslate() {
            new google.translate.TranslateElement("google_element");
        }
    </script>
<?php
} 
?>
    <!-- Custom Js Link -->
    <script>
    const startingMinutes = 10;
    let time = startingMinutes * 60;
    const countdownEl = document.getElementById('countdown');
    setInterval(updateCountDown,1000); // setInterval(function / miliseconds)
    function updateCountDown(){
    const minutes = Math.floor(time / 60); // 600/60
    let seconds = time % 60; // 600 % 10

    if (seconds < 10) {
        seconds = '0'+seconds;
    }else{
        seconds = seconds;
    }

    // seconds = seconds < 10 ? '0'+seconds : seconds; // 1:00

    if(minutes == 0 && seconds == 0){
        countdownEl.innerHTML = '0:00';

    }else{
        countdownEl.innerHTML = `${minutes}:${seconds}`;
        time--;  
    }
}

    const submitBtn = document.querySelector(".submit-btn");
        submitBtn.style.display = "none";

        function recaptchaCallback() {
            submitBtn.style.display = 'block';
        }

    </script>
    <script src="js/script.js"></script>
    <!-- Fontawesome Link -->
    <script src="./fontawesome/js/all.min.js"></script>
</body>

</html>