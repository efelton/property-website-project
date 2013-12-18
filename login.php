<?php

session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
    header('Location: list-properties.php'); // user already logged in so forward them to home page
} else {
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
<!--    <link href="./vendor/bootstrap-3.0.3-dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="./vendor/bootstrap-3.0.3-dist/css/bootstrap.css" rel="stylesheet">
 
    <!-- Custom styles for this template -->
    <link href="./vendor/bootstrap-3.0.3-dist/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
   </head>

  <body>

    <div class="container">
      <div class='form-signin'>
          <?php
            if (isset($_SESSION['loginFailMsg']) && strlen ($_SESSION['loginFailMsg']) >0) {
                echo $_SESSION['loginFailMsg'];
                $_SESSION['loginFailMsg'] = "";
            }
          ?>
      </div>
      <form class="form-signin" role="form" action='checklogin.php' method='post'>
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Email address" name='userid' required autofocus>
        <input type="password" class="form-control" placeholder="Password" name='password' required>
        <br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
  </body>
</html>  
        <?php
 //          include_once "footer.php";
}

?>
