<?php 
	include('../php/functions.php');
	// if (!isAdmin()) {
	// 	$_SESSION['msg'] = "You must log in first";
	// 	header('location: login.php');
	// }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>

<body>
    <header class="header">
        <img class="img" src="../Images/logocrud.png" width="200px">
        <div class="headersearch">
            <a href="index.php">Home</a>
            <a href="vluchten.php">Vluchten</a>
            <a href="overons.php">Over ons</a>
            <a href="reviews.php">Reviews</a>
            <a href="contact.php">Contact</a>
            <?php
        if (!isLoggedIn()) {
                echo "<a href='./account/login.php'>Login</a>";
            }
        ?>
        
        <?php
        if (isAdmin()) {
            echo "<a href='../admin/admin.php'>Admin</a>";
            }
        ?>
        <?php
        if (isLoggedIn()) {
                echo "<a href='logout.php'>Logout</a>";
            }   
        ?>

        </div>
    </header>
    <header>
        <div class="profile-info-container">
            <?php
        if (isLoggedIn()) {
            $userName = $_SESSION['user']['username'];
                echo "<h2 class='profile-username'>Welcome $userName!</h2>"; 
            }
            if (!isLoggedIn()) {
                echo "<h2 class='profile-username'>Welcome to corendon!</h2>"; 
            }
        ?>
        </div>
    </header>

    <header class="headerblokjes">
        <div class="wrap">
            <div class="search">
                <input type="search" class="searchTerm" placeholder="Search...">

                <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </header>
<div class="containerblok22">
<div class="blok22">
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="../Images/belgie.jpeg" style="width:100%">
  <div class="text">België</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="../Images/turkije.jpeg" style="width:100%">
  <div class="text">Turkije</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="../Images/dubai.jpeg" style="width:100%">
  <div class="text">Dubai</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
    <div class="iets">
        <h1 class="overons">Over ons!</h1>
        <p class="ja">Welkom bij Corendon! boek bij ons een ticket, zoek welke ticket het beste bij je past, stuur een mail en je kan zelfs een account maken om jouw berichten en tickets voor de vliegtuigen in te zien.</p>
    </div>
</div>

</div>

    <div class="blok1">

    </div>
</body>
<script src="../js/main.js"></script>
</html>