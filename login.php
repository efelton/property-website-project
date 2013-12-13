<?php

session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
    header('Location: list-properties.php'); // user already logged in so forward them to home page
} else {
// show log in page	
//	include_once "header.php";
// html file
//	include_once "footer.php";

	$_SESSION ['loggedIn'] = 1;

    header('Location: list-properties.php');

} 

?>
