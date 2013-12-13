<?php

/*
 * This constant is declared in index.php
* It prevents this file being called directly
*/
defined('MY_APP') or die('Restricted access');

$link_id=@mysql_connect(DB_HOST, DB_USER, DB_PASSWORD); 
if(!$link_id) {
	die("Unsuccessful connection to db"); 
}

if(!mysql_select_db(DB_DATABASE,$link_id)) {
	die ("Connection to database failed!"); 
} 
