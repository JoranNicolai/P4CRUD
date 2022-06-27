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
            <a href="locaties.php">Locaties</a>
            <a href="contact.php">Contact</a>
            
            <?php
        if (!isLoggedIn()) {
                echo "<a href='./account/login.php'>Login</a>";
            }
        ?>
        
        <?php
        if (isAdmin()) {
            echo "<a href='../admin/admin.php'>Admin</a>";
            } elseif (isLoggedIn()) {
            echo "<a href='account/account.php'>Account</a>";
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
            <p>
<input type="Search" class="searchTerm" onclick="myMove()" value="Klik mij voor JS voorbeeld! "></button> 
</p>
                
                <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </header>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body
        * {box-sizing: border-box;}

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }



        .container {
            border-radius: 5px;
            padding: 20px;
        }
    </style>

<style>
#myContainer {

  position: relative;
  background: transparent;
}
#myAnimation {
  position: absolute;
  background-color: transparent;
}
</style>





</div>




    </body>



    
        <div style="width: 100%"><iframe width="100%" height="1000px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=nl&amp;q=heyendaalseweg%2098+(CorendonS)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/">gps watches</a></iframe></div>
    </form>
  



</html>
</body>
</html>