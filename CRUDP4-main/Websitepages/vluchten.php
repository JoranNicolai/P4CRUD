<?php 
	include('../php/functions.php');
	// if (!isAdmin()) {
	// 	$_SESSION['msg'] = "You must log in first";
	// 	header('location: login.php');
	// }
?>
<?php

$connect = mysqli_connect("localhost", "root", "", "crudp4");

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'			=>	$_GET["id"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	$_POST["hidden_price"],
                'item_quantity'		=>	$_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
    }
    else
    {
        $item_array = array(
            'item_id'			=>	$_GET["id"],
            'item_name'			=>	$_POST["hidden_name"],
            'item_price'		=>	$_POST["hidden_price"],
            'item_quantity'		=>	$_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);

            }
        } 
    }
}
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
        <div class="midden6">
    <h2 class="hoi">Vluchten</h1>
</div>
        <div class="midden1">
            <?php

        if (isset($_POST["submit"])) {
            if (!empty($_POST["search"])) {
                $query = "SELECT * FROM flights WHERE name = '".$_POST["zoekbalk"]."'";
                return;
            } else {
                $query = "SELECT * FROM flights ORDER BY id ASC";
            }
        } else {
            $query = "SELECT * FROM flights ORDER BY id ASC";
        }

        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                ?>


                <div class="col-md-4">
                <div>
                            <img src="../../CRUDP4-main/Images/<?php echo $row["image"]; ?>" class="img-responsive" width="100%" height="250px"  /><br />
                            </div>
                        <div style="border:1px solid transparant; background-color:ghostwhite; border-radius:2px; padding:16px; ">
<div>
                            <h4 class="text-info">
                                Locatie: <?php echo $row["location"]; ?>
                            </h4>

                            <h4 class="text-danger">Prijs: €
                                <?php echo $row["price"]; ?>
                            </h4>

                            <h4 class="text-danger">
                                Description: <?php echo $row["description"]; ?>
                            </h4>
                            <h4 class="text-danger">
                                vertrek: <?php echo $row["date"]; ?>
                            </h4>
                            
                            <input class="submitbutton4" type="submit" name="add_to_cart " style="margin-top:5px; " class="btn btn-success " value="Boeken " />
                            </div>
                           
                        </div>
                     
                    </form>
                   
                </div>


                <?php
            }
        }
        ?>
        </div>
        <div class="blok1 ">

        </div>

    </body>

    </html>