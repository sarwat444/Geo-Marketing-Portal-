<?php
	ob_start();
	session_start();
	include 'admin/connect.php'; 

	$parentID = (int)$_POST['parentID'];


	   $stmt = $con->prepare("SELECT * FROM medcine WHERE country_id = '{$parentID}'");
        // Execute The Statement
        $stmt->execute();
        // Assign To Variable
        $rows = $stmt->fetchAll();

?>

<option value="">......</option>
  <?php foreach($rows as $row) { ?>
            
               <option value="<?php echo $row['id'] ?>"  ><?php echo $row['Name'] ?></option>

            
          <?php   }  ?>
