<?php
session_start();

/* Prevent unauthorised access */
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {
    header('Location: index.php');
}

/*
 * Set up constant to ensure include files cannot be called on their own
*/
define ( "MY_APP", 1 );
/*
 * Set up a constant to your main application path
 */
define ( "APPLICATION_PATH", "application" );


        require_once(APPLICATION_PATH .'/config/common.inc.php');
        require_once(APPLICATION_PATH .'/inc/functions.inc.php');


if (!empty($_GET) && isset($_GET['id'])) {
    
    $propertyID = (int) $_GET['id'];

    $db->delete('properties', array(
        'property_id = ?' => $propertyID));    
}
 header("Location: list-properties.php");
