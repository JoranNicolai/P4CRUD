<?php
include_once '../php/functions.php';
$sql = "DELETE FROM reviews WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}
header('location: ../admin/admin.php');
mysqli_close($db);
?>
<?php 
	include('../php/functions.php');
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must review first";
		header('location: review.php');
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
                    <a href="admin.php" class="mt-5 mb-3">Review Deleted</a>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>