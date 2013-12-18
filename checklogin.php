<?php

   session_start();
   // Define path to application directory
    defined('APPLICATION_PATH')
        || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));
     
    require_once(APPLICATION_PATH .'/config/common.inc.php');
 
    function mycrypt($str) {
        $salt = md5('bandstand-whirligig-eisteddfod'); 
        return md5($str . $salt);
    }
    
 if (!empty($_POST)) {
   //echo print_r($_POST);

// validate the form
        // $form = new FormLogin();
        // if ($form->isValid($_POST)) {
        // $validValues = $form->getValues();
        // print_r($validValues);
        // echo "form is valid";
 
//Take the values and check against the database
       $dbLoginTable = new Zend_DB_Table('adminusers');
       // $username = $form->getValue('username');
       $username = $_POST['userid'];
       // $password = $form->getValue('password');
       $password = $_POST['password'];
       $cryptPassword = mycrypt($password);
       $rows = $dbLoginTable->fetchAll("userid = '$username' and password = '$cryptPassword'");
    
//       $aa=mycrypt("letmein");
//       die ($aa."<p>".mycrypt($password));
     
       if (sizeof($rows) == 1) {
           
         //  echo "user found";
           $_SESSION['loggedIn']=1;
           $_SESSION['user']=$rows[0];
           header("location: list-properties.php");     
       } else {
           // put a message to be displayed on the logon page
           $_SESSION['loginFailMsg']="Those credentials are not correct";
           header("Location: login.php");
       }
 } else {
     header("Location: index.php");
 }
 
 ?>
