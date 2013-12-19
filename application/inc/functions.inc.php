<?php

function output_delete_link($id) {
	return "<a href='delete.php?id=$id'>Delete</a>"; 
}

function output_edit_link($id) {
	return "<a href='add-property1.php?edit_id=$id'>Edit</a>"; 
}


function populateDropdown($array, $defaultValue) {
//    die ("<p>defaultvalue = " . $defaultValue);
    $htmlString = "";
    foreach ($array as $num => $name) {
        if ($num == $defaultValue) {
            $htmlString .= "<option value='$num' selected>$name</option>";            
        } else {
            $htmlString .= "<option value='$num'>$name</option>";
        }
    }
//    die ($htmlString);
    return $htmlString;
}
?>
