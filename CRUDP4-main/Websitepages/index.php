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
        <div class="ok">
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
    <footer>
        <div class="midden">
                <div class="blok3">
                    <a href="index.php">
                        <h3>Vliegtickets</h3>
                    </a>
                </div>
                <div class="blok4">
                    <a href="tickettabel/bundels.php">
                        <h3>Vlucht en hotel</h3>
                    </a>
                </div>
                <div class="blok5">
                    <a href="tickettabel/hotels.php">
                        <h3>Hotels</h3>
                    </a>
                </div>
                <div class="blok6">
                    <a href="tickettabel/taxi.php">
                        <h3>Taxi's</h3>
                    </a>
                </div>
                <div class="blok7">
                    <a href="tickettabel/verhuur.php">
                        <h3>Auto verhuur</h3>
                    </a>
                </div>
               
            
            <div class="blok2">
<div class="formpje5">
    <form class="formpje" action="search_flights.php" method="get" target="_blank">
    
    <div class="formpje">
        <input placeholder="Vertek locatie..." class="formpje" type="text" id="start" name="start">
    </div>
    </div>

    <div class="formpje9">
        <input placeholder="Bestemming..."class="formpje" type="text" id="location" name="location">
    </div>

                    <div class="formpje1">
                        <input placeholder="Start Date..." class="formpje10" type="date" id="from" name="from">
                    </div>
    <div class="formpje1">
        <input placeholder="End Date..." class="formpje10" type="date" id="from" name="from">
    </div>
    
    <div class="formpje4">
        <input placeholder="Amount of people..." class="formpje34" type="number" id="till" name="till">
    </div>
  
    <a><input class="sumbit" type="submit" value="Zoek je vlucht"></a>
</form>


            </div>
        </div>
        <div class="blok1">


        </div>
      <div class="blok10">
        <div class="blok1">
        <a href="klikhier.php"><h5>Privacy policy en Algemene voorwaarden.</h5></a>
        </div>
        </div>
    </footer>
    
</body>

</html>