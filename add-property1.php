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
        require_once(APPLICATION_PATH .'/inc/functions.inc.php');
        
        $propertyID = 0;
        $initialValues = array();
        
        $initialValues['title'] = "";
        $initialValues['address_line_1'] = "";
        $initialValues['address_line_2'] = "";
        $initialValues['address_line_3'] = "";
        $initialValues['price'] = "";
        $initialValues['description'] = "";
        $initialValues['type'] = "1";
        $initialValues['county'] = "1";
        $initialValues['is_sold'] = "0";
        
        if (!empty($_GET) && isset($_GET['edit_id'])) {
            $propertyID = (int) $_GET['edit_id'];


            $dbTable = new Zend_Db_Table('properties');
            
            $select = $dbTable->select()->setIntegrityCheck(false)
              ->from(array('t1' => 'properties'), array('property_id', 'description', 'title','address_line_1', 'address_line_2', 'address_line_3', 'update_timestamp', 'is_sold', 'price', 'photo_path'))
              ->join(array('t2' => 'counties'),'t1.county_id=t2.county_id','t2.county_id')
              ->join(array('t3' => 'property_types'),'t1.type_id=t3.type_id','t3.type_id')
                    ->where('t1.property_id = ?', $propertyID)
            ; 

            $rows = $dbTable->fetchAll($select);
 
            $rowCount = count($rows);

            if ($rowCount == 1) { // found the record to update
              list($record) = $rows;
              foreach ($rows as $row) 
                  $record = $row;
              // default the initial values from the record
              $initialValues['title'] = htmlspecialchars($record['title']) ;
              $initialValues['address_line_1'] = htmlspecialchars($record['address_line_1'] );
              $initialValues['address_line_2'] = htmlspecialchars($record['address_line_2']) ;
              $initialValues['address_line_3'] = htmlspecialchars($record['address_line_3']) ;
              $initialValues['price'] = htmlspecialchars($record['price']) ;
              $initialValues['description'] = htmlspecialchars($record['description']) ;
              $initialValues['type'] = $record['type_id'] ;
              $initialValues['county'] = $record['county_id'] ;
              $initialValues['is_sold'] = $record['is_sold'] ;
              
//              echo "<p> record = ";
//              var_dump($record);
            } else { // record not found so treat as Create New
                $propertyID = 0;
            }
        }
        
        if ($propertyID == 0) {
            $headerTitle = "Add New Property";
        } else {
            $headerTitle = "Edit Property";            
        }
    
//        var_dump ($type_options);
 //       die("here");
        //$country->setMultiOptions($options);
 ?>


<?php
        
        ?>

    <div class="container">
    	<h2>
<?php 
            echo $headerTitle;
?>
        </h2>    
    <form action='process-form.php' enctype="multipart/form-data" class='form-horizontal' method='post'>
        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Title</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="title" name='title' placeholder="Title" 
                    value="<?php echo $initialValues['title'];?>"
                    required>
            </div>
        </div>        
        <div class="form-group">
            <label for="address1" class="col-sm-3 control-label">Address</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="address_line_1" name='address_line_1' 
                    value="<?php echo $initialValues['address_line_1'];?>"
                       placeholder="Address 1" required>
                <input type="text" class="form-control" id="address_line_2" name='address_line_2' 
                    value="<?php echo $initialValues['address_line_2'];?>"
                       placeholder="Address 2">
                <input type="text" class="form-control" id="address_line_3" name='address_line_3' 
                    value="<?php echo $initialValues['address_line_3'];?>"
                       placeholder="Address 3">
            </div>
        </div>
        <div class="form-group">
            <label for="county" class="col-sm-3 control-label" >County</label>
            <div class="col-sm-3">
                <select class="form-control" id="county" name='county' required>
                <?php
                    echo makeCountyDropdown($db, $initialValues['county']);
                ?>
                </select>
            </div>
        </div>        
        <div class="form-group">
            <label for="type" class="col-sm-3 control-label" >Type</label>
            <div class="col-sm-3">
                <select class="form-control" id="type" name='type' required>
                <?php
                    echo makeTypeDropdown($db, $initialValues['type']);
                ?>
                </select>
            </div>
        </div>        
        
        
        <div class="form-group">
            <label for="price" class="col-sm-3 control-label" >Price</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="price" name='price' 
                    value="<?php echo $initialValues['price'];?>"                       
                       placeholder="Price" min='1' max='100000000' buttons='0' required>
            </div>
        </div>      

        <?php 
            if ($propertyID == 0) { // put in the file picker if this is a new property
        ?>
                
            <div class="form-group">
                <label for="price" class="col-sm-3 control-label" >Price</label>
                <div class="col-sm-3">
                    <input type="file" name="photo" accept="image/*" required>
                </div>
            </div>      
        <?php
            }
        ?>
        
        <div class="form-group">
            <label for="is_sold" class="col-sm-3 control-label" >Sold</label>
            <div class="col-sm-3">
                <input type="checkbox" class="form-control" name='is_sold' 
                    <?php 
                        if ($initialValues['is_sold']==1)
                            echo ' checked ';?>                       
                       id="is_sold" >
            </div>
        </div>        
        
        <div class="form-group">
            <label for="description" class="col-sm-3 control-label" >Description</label>
            <div class="col-sm-3">
    ​            <textarea id="description" rows="10" cols="40" name='description' 
                           required><?php echo $initialValues['description'];?></textarea>
            </div>
        </div>        
        <div class="form-group col-sm-3" >
            <input type="submit" class='form-control '>
        </div>
        <input type="hidden" name="property_id" value="<?php echo $propertyID;?>"> 
    </form>
    
    <form action='index.php' class='form-horizontal'>
        <div class="form-group col-sm-3" >
            <button class='form-control '>Cancel</button>
        </div>
    </form>    

    </div>

<?php
        include_once "footer.php";
?>