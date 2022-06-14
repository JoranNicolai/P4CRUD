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
    <footer>

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