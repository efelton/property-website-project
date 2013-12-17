<?php
    session_start();  
    // Define path to application directory
    defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));
     
    require_once(APPLICATION_PATH .'/config/common.inc.php');
    
    include_once "header.php"; ?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Fizzy Properties!</h1>
            <p>Come to us for your most up to date php powered property website. Once again you can make (or lose!) a fortune in Irish property. When is a house not a house? When it's a meal ticket and a means to beggar your neighbour. </p>
          </div>
          <div class="row">
            <?php 
              $dbTable = new Zend_Db_Table('properties');
  
              $select = $dbTable->select()->setIntegrityCheck(false)
                ->from(array('t1' => 'properties'), array('description', 'title','address_line_1', 'address_line_2', 'address_line_3', 'update_timestamp', 'is_sold', 'price', 'photo_path'))
                ->join(array('t2' => 'counties'),'t1.county_id=t2.county_id','t2.name as countyName')
                ->join(array('t3' => 'property_types'),'t1.type_id=t3.type_id','t3.name as typeName')
                ->where('is_sold = 0');
              $rows = $dbTable->fetchAll($select);
  
              $result = array();
              foreach($rows as $row) {
                $result[] = $row->toArray();
              }
              $htmlString = "";
              foreach ($result as $property) {
                  //var_dump ($property);
                  
                  $htmlString .= '<div class="col-6 col-sm-6 col-lg-4">';
                  $htmlString .= "<h4>" . $property['title'] . "</h4>";
                  $htmlString .= '<img src="uploads/'. $property['photo_path'] .'" class="img-responsive"></img>';
                  $htmlString .= "<p><b>Price: </b>€".$property['price']."</p>";
                  $htmlString .= "<p><b>County: </b>".$property['countyName']."</p>";
                  $htmlString .= "<p><b>Type: </b>".$property['typeName']."</p>";
                  $description = $property['description'];
                  if (strlen($description)> 200) {
                      $description = substr($description, 0, 200) . "...";
                  }
                  $htmlString .= "<p><small>$description</small></p>";
//                  $htmlString .= "<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>";
                  $htmlString .= '<p><a class="btn btn-default" href="http://getbootstrap.com/examples/offcanvas/#" role="button">View details »</a></p>';
                  $htmlString .= '</div><!--/span-->';
              }
              echo $htmlString;
                  ?>
            
     <!--       <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="http://getbootstrap.com/examples/offcanvas/#" role="button">View details »</a></p>
            </div><!--/span-->
     <!--       <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="http://getbootstrap.com/examples/offcanvas/#" role="button">View details »</a></p>
            </div><!--/span-->

          </div><!--/row-->
        </div><!--/span-->

<!--        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation"> -->
        <div class="col-xs-12 col-sm-3 " id="sidebar" role="navigation">
          <div class="list-group">
            <a href="login.php" class="list-group-item">Admin</a>
            <a href="features.html" class="list-group-item">Features</a>
            <a href="http://getbootstrap.com/examples/offcanvas/#" class="list-group-item">Link</a>
            <a href="http://getbootstrap.com/examples/offcanvas/#" class="list-group-item">Link</a>
            <a href="http://getbootstrap.com/examples/offcanvas/#" class="list-group-item">Link</a>
            <a href="http://getbootstrap.com/examples/offcanvas/#" class="list-group-item">Link</a>
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <?php  include_once "footer.php"; ?>
