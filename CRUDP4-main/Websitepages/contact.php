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
        <a href="overons.php">Over ons</a>
        <a href="reviews.php">Reviews</a>
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
<!DOCTYPE html>
<html>
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
</head>
<body>

<div class="displayflex">
<div class="container222">
    
<div class="container">

<form action="https://formsubmit.co/jorannicolai@gmail.com" method="post">
    <h1>Contact</h1>
        <label for="fname">Naam</label>
        <input type="text" id="fname" name="firstname" placeholder="Jouw naam...">
        <label for="lname">E-mail</label>
        <input type="text" id="lname" name="lastname" placeholder="Jouw E-mail...">
        <label class="subject" for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Wat wilt u sturen?..." style="height:200px"></textarea>

        <input class="sumbit1" type="submit" value="Submit">
    </form>
</div>
</div>
</div>
<div class="blok30"></div>      
</body>
</html>
</body>
</html>