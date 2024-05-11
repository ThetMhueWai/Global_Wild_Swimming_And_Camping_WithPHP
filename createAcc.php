<?php
include('./admin/connection.php');
if (isset($_POST['userbtnreg'])) {
    $ufirstName = $_POST['firstname'];
    $usurname = $_POST['surname'];
    $uaddress = $_POST['uaddress'];
    $upassword = $_POST['upassword'];
    $uemail = $_POST['uemail'];
    $uphone = $_POST['uphone'];
    $profile = $_FILES['profileimg']['name'];
    if(strlen($ufirstName)<3){
        echo "<script>window.alert('Username need to be longer!')</script>";
        echo "<script>window.location.href='createAcc.php'</script>";
    }
    if(strlen($upassword)<8){
        echo "<script>window.alert('Password need to be longer!')</script>";
        // echo "<script>window.location.href='createAcc.php'</script>";
    }else if(!preg_match('/^(?=.*[\W])(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,50}$/', $upassword)){
        echo "<script>window.alert('Use at least 8 characters and a mix of letters (uppercase and lowercase), numbers, and symbols.')</script>";
    }
    else if($ufirstName != "" && $uemail != "" && $uaddress != "" && $uphone != "") {
        global $connection;
        global $ufirstName;
        global $usurname;
        global $uemail;
        global $upassword;
        global $uphone;
        global $uaddress;
        global $profile;

        $query = "SELECT * FROM users WHERE FirstName='$ufirstName' AND UPassword='$upassword'";
        $userquery = mysqli_query($connection,$query);
        // $count = mysqli_num_rows($userquery);
        // if($count > 0){
        //     echo "<script>window.alert('already exits')</script>";
        // }

        $query1 = "SELECT * FROM users";
        $go_query = mysqli_query($connection, $query1);
        while($row = mysqli_fetch_array($go_query)){
            $dbfirstName = $row['FirstName'];
            $dbemail = $row['UEmail'];
            $dbPhone = $row['UPhoneNo'];
        }
        if ($ufirstName == $dbfirstName) {
            echo "<script>window.alert('This username is already exists!!!')</script>";
            echo "<script>window.location.href='createAcc.php'</script>";
        }
        elseif($uemail == $dbemail){
            echo "<script>window.alert('This email is already exists!!!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        elseif($uphone == $dbPhone){
            echo "<script>window.alert('This phone is already exists!!!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        else{
            $myquery = "INSERT INTO users(FirstName,SurName,UAddress,UPassword,UEmail,UPhoneNo,UPhoto)";
            $myquery .= "VALUES('$ufirstName','$usurname','$uaddress','$upassword','$uemail','$uphone','$profile')";
            $go_query = mysqli_query($connection, $myquery);
            if(!$go_query){
                die("QUERY FAILED" . mysqli_error($connection));
            }
            else{
                move_uploaded_file($_FILES['profileimg']['tmp_name'], 'photo/' . $profile);
            }
            echo "<script>window.alert('You successfully created an account')</script>";
            echo "<script>window.location.href='login.php'</script>";
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
</head>

<body class="feature-body userbody">
    <div class="overall-overlay"></div>
    <!-- 
      NAVBAR
     -->
    <?php
    include('header.php');
    ?>
    <!-- 
        Contact Us
     -->
    <section class="contact-us" id="contact-us">
        <div class="contact-us-container">
            <div class="contact-box login-box">
                <form method="post" class="contact-us-form" enctype="multipart/form-data">
                    <h1 class="login-title">Create Account</h1>
                    <input type="file" name="profileimg" required/>
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Please enter your First Name" required/>
                    <label for="surname">SurName</label>
                    <input type="text" name="surname" id="surname" placeholder="Please enter your Sur Name" required/>
                    <label for="address">Address</label>
                    <input type="text" name="uaddress" id="address" placeholder="Please enter your Address" required/>
                    <label for="password">Password</label>
                    <input type="password" name="upassword" id="password" placeholder="Please enter your password" required/>
                    <label for="email">Email</label>
                    <input type="email" name="uemail" id="email" placeholder="Please enter your email" required/>
                    <label for="phone">Phone Number</label>
                    <input type="text" name="uphone" id="phone" placeholder="Please enter your Phone Number" required/>
                    <div class="form-bottom">
                        <button class="submit-btn" name="userbtnreg">Create</button>
                        <a href="./login.php" class="see-privacy-policy">Have an account? Login</a>
                    </div>
                </form>
                <img src="./assets/createAcc.svg" alt="" class="contact-img" />
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
                <a href="" class="footer-nav-item">Create Account</a>
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
    <!-- Fontawesome Link -->
    <script src="./fontawesome/js/all.min.js"></script>
</body>

</html>