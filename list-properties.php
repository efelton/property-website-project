
<?php 
	session_start();

	if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {
	    header('Location: index.php');
	}

	define ( "MY_APP", 1 );

	define ( "APPLICATION_PATH", "application" );
	include (APPLICATION_PATH . "/inc/config.inc.php");
	include (APPLICATION_PATH . "/inc/db.inc.php");

	include_once "header.php";
?>
    <div class="container">
    	<h2>List Properties</h2>

    		<?php
	    		$sqlQuery = "SELECT * FROM properties";
				$result = mysql_query($sqlQuery);

				$htmlString = "";
				$htmlString .=  "<table class='table table-bordered table-condensed table-striped' border='1'>\n";
				
				$htmlString .= "<tr>";
				$htmlString .= "<th>Description</th>";
				$htmlString .= "<th>Address</th>";
				$htmlString .= "<th>County</th>";
				$htmlString .= "<th>Type</th>";
				$htmlString .= "<th>Updated</th>"; 
				$htmlString .= "<th>Sold</th>"; 
				$htmlString .= "<th>Price</th>"; 
				$htmlString .= "<th>Photo</th>"; 
				$htmlString .= "<th colspan='2'>Actions</th>";

				$htmlString .= "</tr>";
	
				while ($property = mysql_fetch_assoc($result)) {
					$htmlString .=  "<tr>" ;
					$htmlString .=  "<td>";
					$htmlString .=  $property["description"];
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					$htmlString .=  $property["address_line_1"];
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					// county
					$htmlString .=  "</td>";
					$htmlString .=  "<td>";
					// type
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