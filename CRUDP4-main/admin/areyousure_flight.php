<?php 
	include('../php/functions.php');
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $UserID = $_GET["id"];
    echo '<a href="delete_flight.php?id='. $UserID .'">yes</a>';
    echo '<a href="admin.php">no</a>';
    ?>
    
    
</body>
</html>