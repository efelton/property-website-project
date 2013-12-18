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
        require_once(APPLICATION_PATH .'/inc/functions.inc.php');

	include_once "header.php";
?>
    <div class="container">
    	<h2>List Properties</h2>

    		<?php
                    $dbTable = new Zend_Db_Table('properties');
  
                    $select = $dbTable->select()->setIntegrityCheck(false)
                      ->from(array('t1' => 'properties'), array('property_id', 'description', 'title','address_line_1', 'address_line_2', 'address_line_3', 'update_timestamp', 'is_sold', 'price', 'photo_path'))
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
					$htmlString .=  "<td><small>";
					$htmlString .=  $property["title"];
					$htmlString .=  "</small></td>";
					$htmlString .=  "<td><small>";
					$htmlString .=  $property["address_line_1"];
					$htmlString .=  "</small></td>";
					$htmlString .=  "<td><small>";
					// county
					$htmlString .=  $property["countyName"];
					$htmlString .=  "</small></td>";
					$htmlString .=  "<td><small>";
					// type
					$htmlString .=  $property["typeName"];
					$htmlString .=  "</small></td>";
					
                                        $htmlString .=  "<td><small>";
					// updated
					$htmlString .=  $property["update_timestamp"];
					$htmlString .=  "</small></td>";
					$htmlString .=  "<td><small>";
					// sold
                                        if (strcmp($property['is_sold'], "1") == 0) {
                                            $htmlString .= "Yes";
                                        } else {
                                            $htmlString .= "No";                                            
                                        }
					$htmlString .=  "</small></td>";
					$htmlString .=  "<td><small>";
					$htmlString .=  $property["price"];
					$htmlString .=  "</small></td>";
					$htmlString .=  "<td><small>";
					// photo
					$htmlString .=  "</small></td>";
					$htmlString .=  "<td><small>";
					// $htmlString .=  output_edit_link($product["product_id"]);
					$htmlString .= "Edit";
					$htmlString .=  "</small></td>";
					
					$htmlString .=  "<td><small>";
					$htmlString .=  output_delete_link($property["property_id"]);
					$htmlString .=  "</small></td>";
					
					
					
					$htmlString .=  "</tr>\n";

				}
				$htmlString .=  "</table>\n";
				echo $htmlString ;

    		?>
    </div>

<?php 
	include_once "footer.php";
?>