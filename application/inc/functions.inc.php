<?php

function output_delete_link($id) {
	return "<a href='delete.php?id=$id'>Delete</a>"; 
}

function output_edit_link($id) {
	return "<a href='add-property1.php?edit_id=$id'>Edit</a>"; 
}

function makeTypeDropdown($db, $defaultValue) {
        $type_options = $db->fetchPairs('SELECT type_id, name FROM property_types ORDER BY type_id ASC');
        return populateDropdown($type_options, $defaultValue);
}

function makeCountyDropdown($db, $defaultValue) {
    $county_options = $db->fetchPairs('SELECT county_id, name FROM counties ORDER BY county_id ASC');
    return populateDropdown($county_options, $defaultValue);

}


function populateDropdown($array, $defaultValue) {
//    die ("<p>defaultvalue = " . $defaultValue);
    $htmlString = "<option value=''></option>";
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
