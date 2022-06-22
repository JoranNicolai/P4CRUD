<?php 
	include('../../php/functions.php');
	// if (!isAdmin()) {
	// 	$_SESSION['msg'] = "You must log in first";
	// 	header('location: login.php');
	// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css-account/style.css">
    <script src="https://kit.fontawesome.com/15532d8343.js" crossorigin="anonymous"></script>
    <title>register</title>
</head>
<body>
  
    <div class="page">
        <div class="container">
          <div class="left">
            <div class="login">Register</div>
            <div class="eula">If you already have an account, please login with that one. <a class="login_btn1"href="./login.php">Log in</a>.</div>
          </div>
          <div class="right">
            <svg viewBox="0 0 320 300">
              <defs>
                <linearGradient
                                inkscape:collect="always"
                                id="linearGradient"
                                x1="13"
                                y1="193.49992"
                                x2="307"
                                y2="193.49992"
                                gradientUnits="userSpaceOnUse">
                  <stop
                        style="stop-color:#dc2430;"
                        offset="0"
                        id="stop876" />
                  <stop
                        style="stop-color:#7b4397;"
                        offset="1"
                        id="stop878" />
                </linearGradient>
              </defs>
              <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
            </svg>
            <div class="form">
              <form method="post">
                <label for="username">Username</label>
                <input type="text" id="username" value="<?php echo $username; ?>" name="username">
                <label for="email">Email</label>
                <input type="email" id="email" value="<?php echo $email; ?>" name="email">
                <label for="password">Password</label>
                <input type="password" id="password" value="<?php echo $password; ?>" name="password">
                <label for="password1">Re enter Password</label>
                <input type="password" id="password1" value="<?php echo $password1; ?>" name="password1">
                <input type="submit" id="submit" name="register" value="Submit">
              </form>

            </div>
          </div>
        </div>
      </div>


        <?php echo display_error(); ?>
        <script src="assets/js/jQuery.js"></script>
        <script src="assets/js/index.js"></script>
</body>
</html>