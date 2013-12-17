
<?php 
	session_start();

	if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {
	    header('Location: index.php');
	}

	define ( "MY_APP", 1 );

      // Define path to application directory
        defined('APPLICATION_PATH')
        || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));
     
        require_once(APPLICATION_PATH .'/config/common.inc.php');

	include_once "header.php";
?>
    <div class="container">
    	<h2>List Properties</h2>

    		<?php
                    $dbTable = new Zend_Db_Table('properties');
  
                    $select = $dbTable->select()->setIntegrityCheck(false)
                      ->from(array('t1' => 'properties'), array('description', 'title','address_line_1', 'address_line_2', 'address_line_3', 'update_timestamp', 'is_sold', 'price', 'photo_path'))
                        ->join(array('t2' => 'counties'),'t1.county_id=t2.county_id','t2.name as countyName')
                        ->join(array('t3' => 'property_types'),'t1.type_id=t3.type_id','t3.name as typeName')
            ; 

                  $rows = $dbTable->fetchAll($select);
  
                  $result = array();
                  foreach($rows as $row) {
                      $result[] = $row->toArray();
                  }
                  
				$htmlString = "";
				$htmlString .=  "<table class='table table-bordered table-condensed table-striped' border='1'>\n";
				
				$htmlString .= "<tr>";
				$htmlString .= "<th>Title</th>";
				$htmlString .= "<th>Address</th>";
				$htmlString .= "<th>County</th>";
				$htmlString .= "<th>Type</th>";
				$htmlString .= "<th>Updated</th>"; 
				$htmlString .= "<th>Sold</th>"; 
				$htmlString .= "<th>Price</th>"; 
				$htmlString .= "<th>Photo</th>"; 
				$htmlString .= "<th colspan='2'>Actions</th>";

				$htmlString .= "</tr>";
                                   
                                foreach ($result as $property) {
					$htmlString .=  "<tr>" ;
					$htmlString .=  "<td>";
					$htmlString .=  $property["title"];
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					$htmlString .=  $property["address_line_1"];
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					// county
					$htmlString .=  $property["countyName"];
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					// type
					$htmlString .=  $property["typeName"];
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					// updated
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					// sold
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					$htmlString .=  $property["price"];
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					// photo
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					// $htmlString .=  output_edit_link($product["product_id"]);
					$htmlString .= "Edit";
					$htmlString .=  "</td>";
					
					$htmlString .=  "<td>";
					// $htmlString .=  output_delete_link($product["product_id"]);
					$htmlString .= "Delete";
					$htmlString .=  "</td>";
					
					
					
					$htmlString .=  "</tr>\n";

				}
				$htmlString .=  "</table>\n";
				echo $htmlString ;

    		?>
    </div>

<?php 
	include_once "footer.php";
?>