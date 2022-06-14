<?php 
	include('../php/functions.php');
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>

<?php 
    $query = "select * from users";
    $result = mysqli_query($db,$query);
?>
<?php 
    $query = "select * from flights";
    $result_flights = mysqli_query($db,$query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Admin Panel</title>
</head>

<body>
    <div class="header">
        <?php 
        if (isLoggedIn()) {
            $userName = $_SESSION['user']['username'];
                echo "<h1 class=''>Welcome $userName!</h1>"; 
            }
        ?>
    </div>
    <div class="admin-question">
        <h3>What you want to do?</h3>
        </div>
    <div class="keuzes">
        <a onclick="return openCity('Accounts')" class="admin-button">Manage Accounts</a>
        <a onclick="return openCity('Flights')" class="admin-button">Manage Flights</a>
        <a href="../Websitepages/index.php" class="admin-button">Back</a>
    </div>

    <div id="Main" class="admin-keuzes main-keuze">
      Please select one of the options
    </div>

    <div id="Accounts" class="admin-keuzes container" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td>User ID</td>
                                <td>User Name</td>
                                <td>User Email</td>
                                <td>User Password (encrypted)</td>
                                <td>Action</td>
                            </tr>
    
                            <?php 
                                        
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $UserID = $row['id'];
                                            $UserName = $row['username'];
                                            $UserEmail = $row['email'];
                                            $UserPassword = $row['password'];
                                ?>
                            <tr>
                                <td>
                                    <?php echo $UserID ?>
                                </td>
                                <td>
                                    <?php echo $UserName ?>
                                </td>
                                <td>
                                    <?php echo $UserEmail ?>
                                </td>
                                <td>
                                    <?php echo $UserPassword ?>
                                </td>
                                <td>
                                    <?php
                                                echo '<a href="update.php?id='. $UserID .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                echo '<a href="areyousure.php?id='. $UserID .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                ?>
                                </td>
                            </tr>
                            <?php 
                                        }  
                                ?>
    
    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Flights" class="admin-keuzes" style="display: none">
    <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td>Flight ID</td>
                                <td>Location</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Action</td>
                            </tr>
    
                            <?php 
                                        
                                        while($row=mysqli_fetch_assoc($result_flights))
                                        {
                                            $UserID = $row['id'];
                                            $UserName = $row['location'];
                                            $UserEmail = $row['description'];
                                            $UserPassword = $row['price'];
                                ?>
                            <tr>
                                <td>
                                    <?php echo $UserID ?>
                                </td>
                                <td>
                                    <?php echo $UserName ?>
                                </td>
                                <td>
                                    <?php echo $UserEmail ?>
                                </td>
                                <td>
                                    <?php echo $UserPassword ?>
                                </td>
                                <td>
                                    <?php
                                                echo '<a href="update_flight.php?id='. $UserID .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                echo '<a href="areyousure_flight.php?id='. $UserID .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                ?>
                                </td>
                            </tr>
                            <?php 
                                        }  
                                ?>
    
    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Places" class="admin-keuzes" style="display: none">
        Places
    </div>
</body>

<script type="text/javascript" src="https//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script>
  function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("admin-keuzes");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    document.getElementById(cityName).style.display = "block";
  }
</script>
</html>