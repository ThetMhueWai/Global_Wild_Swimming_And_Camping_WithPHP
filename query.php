<?php
include('admin/connection.php');

// create table rssfeed
// $rssfeedtb = "
//     Create Table rssfeed
//     (
//         RSSfeedID int NOT NULL PRIMARY KEY AUTO_Increment,
//         Title int,
//         Description text,
//         Url varchar(255)
//     )
// ";

// $query = mysqli_query($connection, $rssfeedtb);
// if ($query) {
//     echo "Create rssfeed Table Successfully";
// } else {
//     echo "Error In rssfeed Table";
// }


// create table contact
// $contacttb = "
//     Create Table contact
//     (
//         ContactID int NOT NULL PRIMARY KEY AUTO_Increment,
//         UserID int,
//         Message text
//     )
// ";

// $query = mysqli_query($connection, $contacttb);
// if ($query) {
//     echo "Create contact Table Successfully";
// } else {
//     echo "Error In contact Table";
// }


// create table review
// $reviewtb = "
//     Create Table review
//     (
//         ReviewID int NOT NULL PRIMARY KEY AUTO_Increment,
//         UserID int,
//         PDetailID int,
//         ReviewText text,
//         RDate date,
//         Start int,
//         Foreign Key (UserID) References users (UserID),
//         Foreign Key (PDetailID) References packagedetail (PDetailID)
//     )
// ";

// $query = mysqli_query($connection, $reviewtb);
// if ($query) {
//     echo "Create review Table Successfully";
// } else {
//     echo "Error In review Table";
// }


// create table bookdetail
// $bookdetailtb = "
//     Create Table bookdetail
//     (
//         BookingID int,
//         PDetailID int,
//         BookPeople int,
//         Amount int,
//         Foreign Key (BookingID) References booking (BookingID),
//         Foreign Key (PDetailID) References packagedetail (PDetailID)
//     )
// ";

// $query = mysqli_query($connection, $bookdetailtb);
// if ($query) {
//     echo "Create bookdetail Table Successfully";
// } else {
//     echo "Error In bookdetail Table";
// }


// create table booking
// $bookingtb = "
//     Create Table booking
//     (
//         BookingID int NOT NULL PRIMARY KEY AUTO_Increment,
//         UserID int,
//         BookingDate date,
//         ConfirmDate date,
//         BookingStatus text,
//         Foreign Key (UserID) References users (UserID)
//     )
// ";

// $query = mysqli_query($connection, $bookingtb);
// if ($query) {
//     echo "Create booking Table Successfully";
// } else {
//     echo "Error In booking Table";
// }



// create table localattr
// $localattrtb = "
//     Create Table localattr
//     (
//         LocalAttrID int NOT NULL PRIMARY KEY AUTO_Increment,
//         CountryID int,
//         LocalImage varchar(255),
//         LocalAttrName varchar(255),
//         map text,
//         Foreign Key (CountryID) References country (CountryID)
//     )
// ";

// $query = mysqli_query($connection, $localattrtb);
// if ($query) {
//     echo "Create localattr Table Successfully";
// } else {
//     echo "Error In localattr Table";
// }


// create table packagefeature
// $packageftb = "
//     Create Table packagefeature
//     (
//         PKFID int NOT NULL PRIMARY KEY AUTO_Increment,
//         FeatureID int,
//         PKID int,
//         Foreign Key (FeatureID) References features (FeatureID),
//         Foreign Key (PKID) References packages (PKID)
//     )
// ";

// $query = mysqli_query($connection, $packageftb);
// if ($query) {
//     echo "Create packagefeature Table Successfully";
// } else {
//     echo "Error In packagefeature Table";
// }



// create table features
// $featurestb = "
//     Create Table features
//     (
//         FeatureID int NOT NULL PRIMARY KEY AUTO_Increment,
//         FeatureName varchar(200),
//         FImage varchar(255)
//     )
// ";

// $query = mysqli_query($connection, $featurestb);
// if ($query) {
//     echo "Create features Table Successfully";
// } else {
//     echo "Error In features Table";
// }


// create table packagedetail
// $packagedetailtb = "
//     Create Table packagedetail
//     (
//         PDetailID int NOT NULL PRIMARY KEY AUTO_Increment,
//         PKID int,
//         PKTID int,
//         Price int,
//         NoOfPeople int,
//         Status int,
//         View int,
//         Foreign Key (PKID) References packages (PKID),
//         Foreign Key (PKTID) References packagetypes (PKTID)
//     )
// ";

// $query = mysqli_query($connection, $packagedetailtb);
// if ($query) {
//     echo "Create packagedetail Table Successfully";
// } else {
//     echo "Error In packagedetail Table";
// }


// create table packagetypes
// $packagetypestb = "
//     Create Table packagetypes
//     (
//         PKTID int NOT NULL PRIMARY KEY AUTO_Increment,
//         PKTName varchar(100)
//     )
// ";

// $query = mysqli_query($connection, $packagetypestb);
// if ($query) {
//     echo "Create packagetypes Table Successfully";
// } else {
//     echo "Error In packagetypes Table";
// }


// create table packages
// $packagestb = "
//     Create Table packages
//     (
//         PKID int NOT NULL PRIMARY KEY AUTO_Increment,
//         PKName varchar(255),
//         Location text,
//         StartDate date,
//         EndDate date,
//         Duration int,
//         Description varchar(255),
//         Image1 varchar(255),
//         Image2 varchar(255),
//         Image3 varchar(255),
//         CountryID int,
//         Foreign Key (CountryID) References country (CountryID)
//     )
// ";

// $query = mysqli_query($connection, $packagestb);
// if ($query) {
//     echo "Create packages Table Successfully";
// } else {
//     echo "Error In packages Table";
// }


// create table country
// $countrytb = "
//     Create Table country
//     (
//         CountryID int NOT NULL PRIMARY KEY AUTO_Increment,
//         CountryName varchar(50)
//     )
// ";

// $query = mysqli_query($connection, $countrytb);
// if ($query) {
//     echo "Create country Table Successfully";
// } else {
//     echo "Error In country Table";
// }


// create table admin
// $admintb = "
//     Create Table admin
//     (
//         AdminID int NOT NULL PRIMARY KEY AUTO_Increment,
//         AdminName varchar(30),
//         APassword varchar(30),
//         AEmail varchar(30),
//         AAddress varchar(30),
//         APhoneNo varchar(30)
//     )
// ";

// $query = mysqli_query($connection, $admintb);
// if ($query) {
//     echo "Create admin Table Successfully";
// } else {
//     echo "Error In Admin Table";
// }


// create table users
// $userstb = "
//     Create Table users
//     (
//         UserID int NOT NULL PRIMARY KEY AUTO_Increment,
//         FirstName varchar(30),
//         SurName varchar(30),
//         UAddress varchar(30),
//         UPassword varchar(30),
//         UEmail varchar(30),
//         UPhoneNo varchar(30),
//         UPhoto varchar(255)
//     )
// ";

// $query = mysqli_query($connection, $userstb);
// if ($query) {
//     echo "Create user Table Successfully";
// }else{
//     echo "Error In user Table";
// }




?>