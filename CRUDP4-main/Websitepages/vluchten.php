<?php
session_start();
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
        <a href="contact.php">Contact</a>
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
<div class="midden1">
<?php

        if (isset($_POST["submit"])) {
            if (!empty($_POST["search"])) {
                $query = "SELECT * FROM tbl_product WHERE name = '".$_POST["zoekbalk"]."'";
                return;
            } else {
                $query = "SELECT * FROM tbl_product ORDER BY id ASC";
            }
        } else {
            $query = "SELECT * FROM tbl_product ORDER BY id ASC";
        }

        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                ?>
          
   
                <div class="col-md-4">
                    <form method="post" action="menu.php?action=add&id=<?php echo $row["id"]; ?>">
                        <div style="border:1px solid transparant; background-color:ghostwhite; border-radius:2px; padding:16px;" >
                            <img src="../images/<?php echo $row["image"]; ?>" class="img-responsive" width="100%" height="auto"  /><br />

                            <h4 class="text-info"><?php echo $row["name"]; ?></h4>

                            <h4 class="text-danger">€ <?php echo $row["price"]; ?></h4>

                            <input type="text" name="quantity" value="1" class="form-control" />

                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                            <input class="submitbutton1" type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Boeken" />

                        </div>
                    </form>
                </div>
           

                <?php
            }
        }
        ?>
</div>
    <div class="blok1">

    </div>

</body>
</html>