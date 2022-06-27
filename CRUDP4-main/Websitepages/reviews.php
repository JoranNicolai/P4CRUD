<?php
$connect = mysqli_connect("localhost", "root", "", "crudp4");
?>
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
        <a href="overons.php">Over ons</a>
        <a href="reviews.php">Reviews</a>
        <a href="locaties.php">Locaties</a>
        <a href="contact.php">Contact</ a>    <?php
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
            <input type="search" class="searchTerm" placeholder="Search...">

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
</head>
<body>

<div class="displayflex">
<div class="container222">
    
<div class="container">

    <form name="username"  onsubmit="return validateForm()" method="post">
        <h1>Plaats hier uw review</h1>
                <label for="username">Name</label>
                <input type="text" name="username">
                <label for="rating">Rating</label>
                <select id="rating" name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
         
                </select>
                <label for="land">Land</label>
                <select id="land" name="land">
                    <option value="Spanje">spanje</option>
                    <option value="Duitsland">Duitsland</option>
                    <option value="België">België</option>
                    <option value="Dubai">Dubai</option>
                    <option value="Griekenland">Griekenland</option>
                    <option value="Zweden">Zweden</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Turkije">Turkije</option>
                    
                </select>
                <label for="subject">Review</label>
                <input type="text" name="subject">
                <input class="sumbit1" type="submit" id="submit" name="review" value="Submit">
              </form>
</div>
</div>
</div>


<div class="midden6">
    <h2 class="hoi">Reviews</h1>
</div>
<div class="midden111">  
<div class="displayflex111">
                
                
<?php

        if (isset($_POST["submit"])) {
            if (!empty($_POST["search"])) {
                $query = "SELECT * FROM reviews WHERE checked='yes'";
                return;
            } else {
                $query = "SELECT * FROM reviews WHERE checked='yes'";
            }
        } else {
            $query = "SELECT * FROM reviews WHERE checked='yes'";
        }

        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                ?>
        
         

     

        

                <div class="col-md-5">
                    <form method="post" action="menu.php?action=add&id=<?php echo $row["id"]; ?>">
                        <div style="border:1px solid transparant; background-color:ghostwhite; border-radius:2px; padding:16px;" >
                            <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                            <h1></h1>
                            <h4 class="text-danger"> <?php echo $row["content"]; ?></h4>
                            <h4 class="text-danger"><?php echo $row["land"]; ?></h4>
                            <h4 class="text-danger"><?php echo $row["rating"]; ?>/5 stars</h4>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row["content"]; ?>" />

                            <img src="../Images/star.png" width="90%%" >
                            <div class="rating">
    
   </div>
                        </div>
                    </form>
                </div>
           

                <?php
            }
        }
        ?>
</div>
</div>  

<script src="../js/main.js"></script>
</div>
</body>
</html>