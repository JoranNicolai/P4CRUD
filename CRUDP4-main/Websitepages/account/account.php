<?php 
	include('../../php/functions.php');
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
        <link rel="stylesheet" href="../../CSS/styles.css">
    </head>

    <body>

        <header class="header">
            <img class="img" src="../../Images/logocrud.png" width="200px">
            <div class="headersearch">
                <a href="../index.php">Home</a>
                <a href="../vluchten.php">Vluchten</a>
                <a href="../overons.php">Over ons</a>
                <a href="../reviews.php">Reviews</a>
                <a href="../contact.php">Contact</a>
                <?php
        if (!isLoggedIn()) {
                echo "<a href='./../account/login.php'>Login</a>";
            }
        ?>
                    <?php
        if (isAdmin()) {
            echo "<a href='../../admin/admin.php'>Admin</a>";
            } elseif (isLoggedIn()) {
            echo "<a href='../account/account.php'>Account</a>";
            }
        ?>
                        <?php
        if (isLoggedIn()) {
                echo "<a href='../logout.php'>Logout</a>";
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
        <div class="backgroundlol">
            <div class="white2">
                <h1 class="white1">Account gegevens & Geboekte vluchten</h1>
            </div>
            <div class="white3">
                <div class="col2">

                    <?php
    
        if (isset($_POST["submit"])) {
            if (!empty($_POST["search"])) {
                $query = "SELECT * FROM users WHERE username = '$userName'";
                return;
            } else {
                $query = "SELECT * FROM users WHERE username = '$userName'";
            }
        } else {
            $query = "SELECT * FROM users WHERE username = '$userName'";
        }

        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                ?>

                        </form>

                </div>
                <div class="col2">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>username</th>
                                <th>Email</th>
                                <th>Password</th>




                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="white">
                                    <?php echo $row["username"]; ?>
                                </td>
                                <td class="white">
                                    <?php echo $row["email"]; ?>
                                </td>
                                <td class="white">
                                    <?php echo $row["password"]; ?>
                                </td>






                            </tr>

                        </tbody>
                    </table>
                </div>
                <?php
            }
        }
        ?>

            </div>
            <div class="white2">

            </div>
            <div class="col2">
                
                <?php
    
    if (isset($_POST["submit"])) {
        if (!empty($_POST["search"])) {
            $sessionID = $_SESSION["user"]["id"];
            $query = "SELECT] * FROM boekingen WHERE userID = '$sessionID'";
            return;
        } else {
            $sessionID = $_SESSION["user"]["id"];
            $query = "SELECT * FROM boekingen WHERE userID = '$sessionID'";
        }
    } else {
        $sessionID = $_SESSION["user"]["id"];
        $query = "SELECT * FROM boekingen WHERE userID = '$sessionID'";
    }

    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>




                    </form>

            </div>

            <div class="col1">
                <table class="styled-table">
                    <thead>
                        <tr>

                            <th>Vlucht </th>
                            <th>userID</th>
                            <th>boekID</th>
                            <th>vluchtID</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="white">
                                <?php echo $row["name"]; ?>
                            </td>
                            <td class="white">
                                <?php echo $row["userID"]; ?>
                            </td>
                            <td class="white">
                                <?php echo $row["boekingID"]; ?>
                            </td>
                            <td class="white">
                                <?php echo $row["flightID"]; ?>
                            </td>
                            <td class="white">
                                <form action="#">
                                <input class="sumbit2" type="submit" id="submit44" name="submit44" value="delete">
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <?php
  
  if (isset($_POST['submit44'])) {
      echo "GeeksforGeeks";
  }
  ?>
            <?php
        }
    }
    ?>
        </div>
        </div>
        </div>
        </div>
        <div class="blok1 ">

        </div>








    </body>

    <script src="../../js/main.js"></script>

    </html>