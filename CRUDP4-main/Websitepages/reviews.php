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

    <form method="post">
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
                    <option value="spanje">spanje</option>
                    <option value="rusland">rusland</option>
                    <option value="noord-korea">noord-korea</option>
                    <option value="zuid-korea">zuid-korea</option>
                    <option value="polen">Polen</option>
                </select>
                <label for="subject">Review</label>
                <input type="text" name="subject">
                <input type="submit" id="submit" name="review" value="Submit">
              </form>
</div>
</div>
</div>
<div class="midden6">
                <h2 class="hoi">Reviews</h1>
                </div
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
        
     <div class="midden111">  
        
   <div class="displayflex111">
                <div class="col-md-5">
                    <form method="post" action="menu.php?action=add&id=<?php echo $row["id"]; ?>">
                        <div style="border:1px solid transparant; background-color:ghostwhite; border-radius:2px; padding:16px;" >
                            <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                            <h4 class="text-danger2"><?php echo $row["id"]; ?>/5 stars</h4>
                            <h4 class="text-danger"> <?php echo $row["content"]; ?></h4>
                            
                            
                            <h4 class="text-danger2"><?php echo $row["id"]; ?>/5 stars</h4>
                            <h4 class="text-danger2"><?php echo $row["id"]; ?>/5 stars</h4>
                            <h4 class="text-danger2"><?php echo $row["id"]; ?>/5 stars</h4>
                            <h4 class="text-danger2"><?php echo $row["id"]; ?>/5 stars</h4>
                            <h4 class="text-danger2"><?php echo $row["id"]; ?></h4>
                            <h4 class="text-danger"><?php echo $row["rating"]; ?>/5 stars</h4>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row["content"]; ?>" />

                            <img src="../Images/star.png" width="100%" >
                        </div>
                    </form>
                </div>
           

                <?php
            }
        }
        ?>
</div>
</div>  
<!-- <script>../js/starrating.js</script> -->
</body>
</html>