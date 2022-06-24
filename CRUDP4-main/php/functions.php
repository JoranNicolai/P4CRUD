<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'crudp4');


// variable declaration
$username  = "";
$email     = "";
$password  = "";
$password1 = "";
$errors    = array(); 

// for users
if (isset($_POST['register'])) {
	registerAcc();
}
if (isset($_POST['login'])) {
	login();
}
if (isset($_POST['review'])) {
	review();
}

// REGISTER USER
function registerAcc(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $password, $password1;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password 	 = 	e($_POST['password']);
	$password1 	 = 	e($_POST['password1']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "&#1074;&#1114;ï¿½ Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "&#1074;&#1114;ï¿½ Email is required"); 
	}
	if (empty($password)) { 
		array_push($errors, "&#1074;&#1114;ï¿½ Password is required"); 
	}
	if ($password != $password1) {
		array_push($errors, "&#1074;&#1114;ï¿½ The two passwords do not match");
	}

	$check_email = mysqli_query($db, "SELECT email FROM users where email = '$email' ");
	if(mysqli_num_rows($check_email) === 1){
		array_push($errors, "&#1074;&#1114;ï¿½ Email already in use");
	} else {

	$check_user = mysqli_query($db, "SELECT username FROM users where username = '$username' ");
	if(mysqli_num_rows($check_user) === 1){
		array_push($errors, "&#1074;&#1114;ï¿½ Username already in use");
	} else {


	// register user if there are no errors in the form
	if (count($errors) == 0) {

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (`username`, `email`, `password`) 
					  VALUES('$username', '$email', PASSWORD('$password'))";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!";
			header('location: home.php');
		} else{
			$query = "INSERT INTO users (`username`, `email`, `password`) 
					  VALUES('$username', '$email', PASSWORD('$password'))";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: ../index.php');
		}
	}
}
	}
}


// ...
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['username'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function isUser()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['username'] == '*' ) {
		return true;
	}else{
		return false;
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error"> ';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

function isLoggedIn2()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ./login.php");
}// call the login() function if register_btn is clicked

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "&#1074;&#1114;ï¿½ Username is required");
	}
	if (empty($password)) {
		array_push($errors, "&#1074;&#1114;ï¿½ Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {

		$query = "SELECT * FROM users WHERE username='$username' AND `password`=PASSWORD('$password') LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: ../index.php');
		} else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}


function review(){
	global $db, $name, $errors, $rating, $subject;

	// grap form values
	$name = e($_POST['username']);
	$rating = e($_POST['rating']);
	$subject = e($_POST['subject']);
	$land = e($_POST['land']);

	// make sure form is filled properly
	if (empty($name)) {
		array_push($errors, "&#1074;&#1114;ï¿½ Name is required");
	}
	if (empty($rating)) {
		array_push($errors, "&#1074;&#1114;ï¿½ Rating is required");
	}
	if (empty($subject)) {
		array_push($errors, "&#1074;&#1114;ï¿½ Description is required");
	}
	if (empty($land)) {
		array_push($errors, "&#1074;&#1114;ï¿½ Country is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {

		$query = "INSERT INTO reviews (`name`, `content`, `rating`, `land`) 
		VALUES('$name', '$subject', '$rating', '$land')";
		mysqli_query($db, $query);
	}
}

