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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
        <a href="">Over ons</a>
        <a href="">Contact</a>
        <?php
        if (!isLoggedIn()) {
                echo "<a href='./account/login.php'>Login</a>";
            }
        ?>
        <?php
        if (isLoggedIn()) {
                echo "<a href='logout.php'>Logout</a>";
            }
        ?>
        <?php
        if (isAdmin()) {
                echo "<a href=\"./account/login.php\">Admin</a>";
            }
        ?>
        <a href="overons.php">Over ons</a>
        <a href="">Contact</ a>
        <a href="./account/login.php">Login</a>
    </div>
</header>
<header>
<div class="profile-info-container">
    <h2 class="profile-username">Welcome <?php  if (isset($_SESSION['user'])) : ?><?php echo $_SESSION['user']['username']; ?><?php endif ?>!</h2>
</div>

        <a href="overons.php">Over ons</a>
        <a href="contact.php">Contact</ a>
        <a href="./account/login.php">Login</a>
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
<div class="profile-info-container">
    <h2 class="profile-username">u bent in gelogt als:<?php  if (isset($_SESSION['user'])) : ?><?php echo $_SESSION['user']['username']; ?><?php endif ?></h2>
</div>
<footer>
    <div class="blok3">
        <a href="index.php"><h3>Vliegtickets</h3></a>
    </div>
    <div class="blok4">
        <a href="tickettabel/bundels.php"><h3>Vlucht en hotel</h3></a>
    </div>
    <div class="blok5">
        <a href="tickettabel/hotels.php"><h3>Hotels</h3></a>
    </div>
    <div class="blok6">
        <a href="tickettabel/taxi.php"><h3>Taxi's</h3></a>
    </div>
    <div class="blok7">
        <a href="tickettabel/verhuur.php"><h3>Auto verhuur</h3></a>
    </div>
    <div class="blok2">
        <form class="formpje" action="">
            <input class="formpje" type="text" placeholder="Waar begint uw vlucht?">
        </form>
        <form class="formpje" action="">
            <input class="formpje" type="text" placeholder="Waar gaat uw vlucht heen?">
        </form>
        <form class="formpje1" action="">
            <input class="formpje10" type="date" placeholder="Heen">
        </form>
        <form class="formpje1" action="">
            <input class="formpje10" type="date" placeholder="Heen">
        </form>
        <form class="formpje4" action="">
            <input class="formpje" type="number" placeholder="Aantal personen">
        </form>
        <a href="#"><input class="sumbit" type="submit" value="Zoek je vlucht"></a>
    </div>

    <div class="blok1">

    </div>
</body>
</html>