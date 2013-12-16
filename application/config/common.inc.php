<?php
  //  error_reporting(E_ALL);
//    set_include_path(APPLICATION_PATH . "/vendor/Smarty/libs" . PATH_SEPARATOR . get_include_path());
    set_include_path(APPLICATION_PATH . "/vendor" . PATH_SEPARATOR . get_include_path());
//    set_include_path(APPLICATION_PATH . "/vendor/zend" . PATH_SEPARATOR . get_include_path());
//    set_include_path(APPLICATION_PATH . "/forms" . PATH_SEPARATOR . get_include_path());
  
//    die(get_include_path());
   
    require_once('Zend/Loader.php');
    Zend_Loader::loadClass('Zend_Db_Table');
    Zend_Loader::loadClass('Zend_Registry');
    Zend_Loader::loadClass('Zend_Form');
    Zend_Loader::loadClass('Zend_View');
         
    $db = Zend_Db::factory('Pdo_Mysql', array('host'=>'','username'=>'root','password'=>'','dbname'=>'property'));
       
    Zend_Db_Table::setDefaultAdapter($db);

?>
