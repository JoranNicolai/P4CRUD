<?php 
	include('../php/functions.php');
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first as admin";
		header('location: ../Websitepages/account/login.php');
	} else {
        if (!isAdmin()) {
            $_SESSION['msg'] = "You must log in first as admin";
            header('location: ../Websitepages/index.php');
        }
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
    ok
</body>
</html>