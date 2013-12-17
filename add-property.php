<?php 
	session_start();

	if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {
	    header('Location: index.php');
	}
	include_once "header.php";

      // Define path to application directory
        defined('APPLICATION_PATH')
        || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));
     
        require_once(APPLICATION_PATH .'/config/common.inc.php');
        
        $view = new Zend_View();
        $form = new Zend_Form;
        
        $form->setAction("process-form.php");
        $form->setMethod("post");

        $type_options = $db->fetchPairs('SELECT type_id, name FROM property_types ORDER BY type_id ASC');
        $county_options = $db->fetchPairs('SELECT county_id, name FROM counties ORDER BY county_id ASC');
        var_dump ($type_options);
 //       die("here");
        //$country->setMultiOptions($options);
        
        $form->addElement('text', 'title', array(
            'label'      => 'Title',
            'value'      => 'test',
            'required'   => true
        ));
        $form->addElement('text', 'address_line_1', array(
            'label'      => 'Address',
            'value'      => 'test'
        ));
        $form->addElement('text', 'address_line_2', array(
//            'label'      => 'Address',
            'value'      => 'test'
        ));
        $form->addElement('text', 'address_line_3', array(
//            'label'      => 'Address',
            'value'      => 'test'
        ));

        $form->addElement('select', 'county', array(
            'label'      => 'County',
//            'value'      => 'test'
        ));
        
        echo "<p> before setting = ";
        var_dump ($form->getElement('county')->getMultiOptions());
        $form->getElement('county')->addMultiOptions(array($county_options));       
        echo "</p><p> after setting = ";
        var_dump ($form->getElement('county')->getMultiOptions());

        $form->addElement('select', 'type', array(
            'label'      => 'Type',
//            'value'      => 'test'
        ));
        
//        echo "<p> before setting = ";
//        var_dump ($form->getElement('type')->getMultiOptions());
        $form->getElement('type')->addMultiOptions(array($type_options));       
//        echo "</p><p> after setting = ";
//        var_dump ($form->getElement('type')->getMultiOptions());

        $form->addElement('text', 'price', array(
            'label'      => 'Price',
            'value'      => '0'
        ));
        $form->addElement('checkbox', 'sold', array(
            'label'      => 'Sold',
            'value'      => '0'
        ));
        $form->addElement('text', 'photo', array(
            'label'      => 'Photo',
            'value'      => ''
        ));
        $form->addElement('textarea', 'description', array(
            'label'      => 'Description',
            'value'      => 'test'
        ));
        $form->addElement('submit', 'submit', array(
            'label'      => 'Submit',
        ));

/*/*        $element = new Zend_Form_Element('foo', array(
    'label'      => 'Foo',
    'belongsTo'  => 'bar',
    'value'      => 'test',
    'prefixPath' => array('decorator' => array(
        'My_Decorator' => 'path/to/decorators/',
    )),
    'decorators' => array(
        'SimpleInput',
        'SimpleLabel',
    ),
));*/
        
        ?>

    <div class="container">
    	<h2>Add New Property </h2>

<?php 
        echo $form -> render($view);
?>
    </div>

<?php
        include_once "footer.php";
?>