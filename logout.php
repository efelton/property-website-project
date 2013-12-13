<?php

session_start();
session_destroy();

header('Location: index.php'); // user already logged in so forward them to home page

?>
