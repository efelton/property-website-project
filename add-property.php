<?php 
	session_start();

	if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {
	    header('Location: index.php');
	}
	include_once "header.php";
?>

    <div class="container">
    	<h2>Add New Property </h2>
    </div>

<?php 
	include_once "footer.php";
?>