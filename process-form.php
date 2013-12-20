<?php
	session_start();

	if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {
	    header('Location: index.php');
	}

      // Define path to application directory
      defined('APPLICATION_PATH')
      || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));
     
      require_once(APPLICATION_PATH .'/config/common.inc.php');
      
      $propertyID = $_POST['property_id'];  

      $form = new Zend_Form;

//        $form->setAction("process-form.php");
//        $form->setMethod("post");

      var_dump($_POST); echo "<p>";
      var_dump($_FILES); echo "<p>";
        $form->addElement('text', 'title', array(
            'required'   => true
        ));
        $form->addElement('text', 'address_line_1', array(
            'required'   => true
        ));
//        $form->addElement('text', 'address_line_2', array(
//            'label'      => 'Address',
//            'value'      => 'test'
//        ));
//        $form->addElement('text', 'address_line_3', array(
//            'label'      => 'Address',
//            'value'      => 'test'
//        ));
        $form->addElement('text', 'county', array(
            'required'   => true,
            'validators' => array (
                array('Digits', false),
                )
        ));
        
//        echo "<p> before setting = ";
//        var_dump ($form->getElement('county')->getMultiOptions());
//        $form->getElement('county')->addMultiOptions(array($county_options));       
//        echo "</p><p> after setting = ";
//        var_dump ($form->getElement('county')->getMultiOptions());

        $form->addElement('text', 'type', array(
            'required'   => true,
            'validators' => array (
                array('Digits', false),
                )
        ));
        
//        echo "<p> before setting = ";
//        var_dump ($form->getElement('type')->getMultiOptions());
//        $form->getElement('type')->addMultiOptions(array($type_options));       
//        echo "</p><p> after setting = ";
//        var_dump ($form->getElement('type')->getMultiOptions());

        $form->addElement('text', 'price', array(
            'required'   => true,
            'validators' => array (
                array('Digits', false),
                array('LessThan', false, 100000001),
                array('GreaterThan',false, 0),
            ),
            
        ));
        $form->addElement('checkbox', 'sold', array(
            'label'      => 'Sold',
        ));
        if ($propertyID == 0) { // validate image file if new property
            $form->addElement('file', 'photo', array(
                'label'      => 'Photo',
//              'destination'  => 'uploads/',
                'validators' => array (
                    array('Count', false, 1),
                    array('Size',false, 150000),
                    array('Extension',false, 'jpg,png,gif')
                ),
        ));
            
        }
        $form->addElement('textarea', 'description', array(
            'required'   => true,
        ));
      
//      var_dump ($_POST);
//      die("here");
      if ($form->isValid($_POST)) {
          echo "is valid!";
          
 
//          $imageFile = $form->getAttrib('photo');  
//          echo "<p> imagefile = ";
//          var_dump($imageFile );
          echo "<p>";
          var_dump($_FILES);
          echo "</p>";
 
  //        $location = $imageFile->getFileName();
  //        die ("location = $location");
          $data = array(
            'title'      => $_POST['title'],
            'address_line_1' => $_POST['address_line_1'],
            'address_line_2' => $_POST['address_line_2'],
            'address_line_3' => $_POST['address_line_3'],
            'price' => $_POST['price'],
//            'is_sold' => $_POST['is_sold'],
            'description' => $_POST['description'],
            // type  
            'type_id' => $_POST['type'],             
            // county
            'county_id' => $_POST['county'],
            'update_timestamp' => date('Y.m.d - H:i:s'),
            // photo
        );

        if (isset($_POST['is_sold']) && strlen($_POST['is_sold'])>0) {
            $data['is_sold'] = "1";
        } else
            $data['is_sold'] = "0";

//var_dump ($data); die("here");
          
      $propertyID = $_POST['property_id'];  
          
        if ($propertyID == 0) {
            // store the image
            if(!move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/". $_FILES['photo']['name'])) {
      		die("<p>There was an error uploading the file, please try again!");

            }
            $data['photo_path'] = $_FILES['photo']['name'];
            
            $db->insert('properties', $data);        
        } else {
//            $data = array(  
//                'updated_on'      => '2007-03-23',
//                'bug_status'      => 'FIXED'
//            );
            $where = "property_id = $propertyID";
 //           die($where);
            $n = $db->update('properties', $data, $where);            
        }
        // check for errors

        
	    header('Location: list-properties.php');
      } else {
      
          echo "not valid!";
          $errors   = $form->getErrors();
          $messages = $form->getMessages();
          echo "<p> errors = " ;
          var_dump ($errors);
          echo "</p><p> messages = " ;
          var_dump( $messages);
      }
?>
