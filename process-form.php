<?php
	session_start();

	if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {
	    header('Location: index.php');
	}

      // Define path to application directory
      defined('APPLICATION_PATH')
      || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));
     
      require_once(APPLICATION_PATH .'/config/common.inc.php');
      
      $form = new Zend_Form;
      
      var_dump ($_POST);
      if ($form->isValid($_POST)) {
          echo "is valid!";
          $data = array(
            'title'      => $_POST['title'],
            'address_line_1' => $_POST['address_line_1'],
            'address_line_2' => $_POST['address_line_2'],
            'address_line_3' => $_POST['address_line_3'],
            'price' => $_POST['price'],
            'is_sold' => $_POST['sold'],
            'description' => $_POST['description'],
            // type  
            'type_id' => $_POST['type'],             
            // county
            'county_id' => $_POST['county'],
            'update_timestamp' => date('Y.m.d - H:i:s'),  
            // photo
        );
 
        $db->insert('properties', $data);
        
        // check for errors
        
	    header('Location: list-properties.php');
        
          
      } else {
      
          echo "not valid!";
      }
?>
