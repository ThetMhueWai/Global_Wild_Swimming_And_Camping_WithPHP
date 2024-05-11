<?php
session_start();
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking</title>
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
        BOOKING
     -->
    <section class="booking" id="booking">
      <div class="booking-container">
        <h1 class="booking-title">Booking</h1>
        <div class="booking-and-recipe">
          <form class="booking-form">
            <label for="username">Username</label>
            <input
              type="text"
              name="username"
              id="username"
              placeholder="Please enter your username"
            />
            <label for="email">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Please enter your email"
            />
            <!-- <label for="no-of-guests">Number of Guests</label>
            <input
              type="number"
              name="no-of-guests"
              id="no-of-guests"
              placeholder="Number of Guests"
            /> -->
            <label for="phone">Phone Number</label>
            <input
              type="tel"
              name="phone"
              id="phone"
              placeholder="Phone Number"
            />
            <button class="booking-btn">Submit Booking</button>
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
                <tr>
                  <td class="recipe-camp">Kan Daw Gyi</td>
                  <td class="recipe-guests">3</td>
                  <td class="recipe-cost">40</td>
                </tr>
                <tr>
                  <td class="recipe-camp">Kan Daw Gyi</td>
                  <td class="recipe-guests">3</td>
                  <td class="recipe-cost">40</td>
                </tr>
                <tr>
                  <td class="recipe-camp">Kan Daw Gyi</td>
                  <td class="recipe-guests">3</td>
                  <td class="recipe-cost">40</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2" class="total-cost">Total Cost</td>
                  <td class="total-price">400</td>
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
