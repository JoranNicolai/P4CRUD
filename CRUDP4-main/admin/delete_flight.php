<?php
include_once '../php/functions.php';
$sql = "DELETE FROM flights WHERE id=?";
if($stmt = mysqli_prepare($db, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $param_id);
    
    // Set parameters
    $param_id = $_GET["id"];
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Records updated successfully. Redirect to landing page
        header("location: admin.php");
        exit();
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}
mysqli_close($db);
?>
<?php 
	
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="admin.php" class="mt-5 mb-3">User Deleted</a>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>