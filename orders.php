

<?php

	/*
	======================================================
	== Medcine for Orders  By Medical Representative
	======================================================
	*/

	ob_start(); // Output Buffering Start

	session_start();


	$pageTitle = 'MR Dashboard';

	if (isset($_SESSION['user'])) {

		include 'init.php';
      
		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        $mr_id = $_SESSION['uid'] ;
        


		if ($do == 'Manage') {
            	$stmt = $con->prepare("SELECT 
										orders.*, 
										medcine.Name AS medcine_name ,
                                        pharmiset.Name AS pharmiset_name 
								
									FROM 
										orders
									INNER JOIN 
										medcine 
									ON 
                                    
										medcine.id = orders.Medcine_ID 
                                        
                                    INNER JOIN 
										pharmiset 
									ON 
										pharmiset.ID = orders.Pharmiset_ID 
                                    
									   WHERE 
                                    
                                    orders.MR_ID = '$mr_id'
                                    
									ORDER BY 
										ID DESC");
          /*
			$stmt = $con->prepare("SELECT 
										orders.*, 
										medcine.Name  AS medcine_name, 
                                        doctor.Name   As doctor_name	,
                                        pharmiset.Name AS  pharmiset_name
									FROM 
										orders
                         
								    INNER JOIN 
										medcine 
									ON 
								
                                        medcine.id =  orders.Medcine_ID
                                        
									INNER JOIN 
										pharmiset 
									ON 
										pharmiset.ID = orders.Pharmiset_ID 
                                        
									INNER JOIN 
										doctor 
									ON 
										doctor.ID = orders.Doctor_ID
                        
                                    
                                    WHERE 
                                    
                                    orders.MR_ID = '$mr_id'
                                    
					");
            */

		//	$stmt = $con->prepare("SELECT * FROM orders WHERE MR_ID = '$mr_id' ");

			// Execute The Statement

			$stmt->execute();

			// Assign To Variable 

			$items = $stmt->fetchAll();

			if (! empty($items)) {

			?>



<!--------------------------------start model one----------------->
<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">All Hospital</h4>
      </div>
      <div class="modal-body">
          <?php 
                 $parent = ((isset($_POST['parent']) && !empty($_POST['parent']))?sanitize($_POST['parent']) : '');
                
                 $stmt = $con->prepare("SELECT * FROM departments");

        // Execute The Statement

        $stmt->execute();

        // Assign To Variable

        $rows = $stmt->fetchAll(); ?>

          <!-- End Find Departments -->
        

        <form method="post" action="hospital.php">
            <div class="form-group">
                <label >Select Convernrate </label>
         <select class="form-control search"  name="parent" id="parent">
             
              <option value=""<?php echo (($parent == '')?' selected' : ''); ?>>..........</option>
                 <?php foreach($rows as $row) { ?>
              
            
                <option value="<?php echo  $row['id']; ?>"<?php echo (($parent == $row['id'])?' selected' : ''); ?>><?php echo  $row['name']; ?></option>
            
                   <?php   }  ?>
                  
         </select>
            </div>
          
            <div class="form-group">
                <label >Select City</label>
         <select class="form-control search"  name="child" id="child"></select>
            </div>
            

   

   
      </div>
      <div class="modal-footer">
           <input type="submit" class="btn btn-primary"value="Show Results">
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--------------------------------end model one----------------->

<!--------------------------------start clinic model two----------------->
<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
          
          <?php 
                 $parent1 = ((isset($_POST['parent']) && !empty($_POST['parent']))?sanitize($_POST['parent']) : '');
                
                 $stmt = $con->prepare("SELECT * FROM departments");

        // Execute The Statement

        $stmt->execute();

        // Assign To Variable

        $rows = $stmt->fetchAll(); 
          ?>
         <form method="post" action="clinic.php">
             <div class="form-group">
                 <label >Select Convernrate </label>
         <select class="form-control search"  name="parent1" id="parent1">
              <option value=""<?php echo (($parent1 == '')?' selected' : ''); ?>>..........</option>
                 <?php foreach($rows as $row) { ?>
              
            
                <option value="<?php echo  $row['id']; ?>"<?php echo (($parent1 == $row['id'])?' selected' : ''); ?>><?php echo  $row['name']; ?></option>
            
                   <?php   }  ?>
                  
         </select>
             </div>
          
             <div class="form-group">
                 <label >Select City</label>
         <select class="form-control search"  name="child1" id="child1"></select>
             </div>
            

   

   
      </div>
      <div class="modal-footer">
         <input type="submit" class="btn btn-primary"value="Show Results">
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--------------------------------end model two----------------->


<!--------------------------------start pharmacy model----------------->
<!-- Modal -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">All Pharmacies</h4>
      </div>
      <div class="modal-body">
          <?php 
                 $parent = ((isset($_POST['parent2']) && !empty($_POST['parent2']))?sanitize($_POST['parent2']) : '');
                
                 $stmt = $con->prepare("SELECT * FROM departments");

        // Execute The Statement

        $stmt->execute();

        // Assign To Variable

        $rows = $stmt->fetchAll(); ?>

          <!-- End Find Departments -->
        

        <form method="post" action="pharmacy.php">
            <div class="form-group">
                <label >Select Convernrate </label>
         <select class="form-control search"  name="parent2" id="parent2">
              <option value=""<?php echo (($parent == '')?' selected' : ''); ?>>..........</option>
                 <?php foreach($rows as $row) { ?>
              
            
                <option value="<?php echo  $row['id']; ?>"<?php echo (($parent == $row['id'])?' selected' : ''); ?>><?php echo  $row['name']; ?></option>
            
                   <?php   }  ?>
                  
         </select>
            </div>
          
            <div class="form-group">
                <label >Select City</label>
         <select class="form-control"  name="child2" id="child2"></select>
            </div>
            

   

   
      </div>
      <div class="modal-footer">
           <input type="submit" class="btn btn-primary"value="Show Results">
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--------------------------------end pharmacy model ----------------->
		
<!--
			<div class="side col-md-4 ">
			  <ul>
			      <li><i class="fa fa-angle-right"></i> <a href="#">Mange All Medcines</a> </li>
			      <li><i class="fa fa-angle-right"></i> <a data-toggle="modal" data-target="#myModal1">All Hospital</a> </li>
				  <li><i class="fa fa-angle-right"></i> <a data-toggle="modal" data-target="#myModal2">All Clinic</a> </li>
			      <li><i class="fa fa-angle-right"></i> <a data-toggle="modal" data-target="#myModal3">All Pharmacy</a> </li>

			  </ul>
			</div>
-->


<!--Start  Table -->
   <!--Strat Tabels -->
<div id="page-wrapper">
                <div class="row">
   
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">All tasks</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Table Descripe All Products
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>                     
                                               	<th>#ID</th>
                                                <th>Quantity</th>
                                                <th>Order Date </th>
                                                <th>Medcine  Name</th>
                                                <th>Doctor</th>
                                                <th>Pharmiest </th>
                                                <th>Control</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
                                            
                            	<?php
							foreach($items as $item) {
								echo "<tr>";
                                
                                
            
									echo "<td>" . $item['ID'] . "</td>";
									echo "<td>" . $item['Quantity'] . "</td>";
									echo "<td>" . $item['Order_Date'] . "</td>";
									echo "<td>" . $item['medcine_name'] ."</td>";
									echo "<td>" ;
                                    
                                      if(isset($item['Doctor_ID']) && !empty($item['Doctor_ID'])  )
                                      {
                                          echo $item['Doctor_ID'] ; 
                                    
                                      }
                                      else{ echo "ــ" ;  }
                                            
                                   	echo "</td>" ;
                                	echo "<td>" ;
                                    
                                      if(isset($item['pharmiset_name']) && !empty($item['pharmiset_name'])  )
                                      {
                                          echo $item['pharmiset_name'] ; 
                                    
                                      }
                                      else{ echo "ــ" ;  }
                                            
                                   	echo "</td>" ;
									
                                
                                
                                
                                
                                
                                
                                
									echo "<td>
										<a href='index.php?do=Edit&itemid=" . $item['ID'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
										";
									
									echo "</td>";
								echo "</tr>";
							}
						?>
						<tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                               
                            </div>
                            
                            <!-- /.panel-body -->
                        
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                
        
           
        </div>
    

</div>
</div>   
    <!--End Ttabels  -->

			<?php } else {

				echo '<div class="container">';
					echo '<div class="nice-message">There\'s No Items To Show</div>';
					echo '<a href="items.php?do=Add" class="btn btn-sm btn-primary">
							<i class="fa fa-plus"></i> New Item
						</a>';
				echo '</div>';

			} ?>

		<?php 

		}  elseif ($do == 'Edit') {

			// Check If Get Request item Is Numeric & Get Its Integer Value

			$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

			// Select All Data Depend On This IDs

			$stmt = $con->prepare("SELECT * FROM medcine WHERE id = ?");

			// Execute Query

			$stmt->execute(array($itemid));

			// Fetch The Data

			$item = $stmt->fetch();

			// The Row Count

			$count = $stmt->rowCount();

			// If There's Such ID Show The Form

			if ($count > 0) { ?>

				<h1 class="text-center">Edit Item</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST">
						<input type="hidden" name="itemid" value="<?php echo $itemid ?>" />
						<!-- Start Name Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10 col-md-6">
								<input 
									type="text" 
									name="name" 
									class="form-control" 
									required="required"  
									placeholder="Name of The Item"
									value="<?php echo $item['Name'] ?>"
									readonly />
							</div>
						</div>
						<!-- End Name Field -->
						<!-- Start Description Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Description</label>
							<div class="col-sm-10 col-md-6">
								<input 
									type="text" 
									name="description" 
									class="form-control" 
									required="required"  
									placeholder="Description of The Item"
									value="<?php echo $item['Description'] ?>" 

									readonly/>
							</div>
						</div>
						<!-- End Description Field -->
						<!-- Start Price Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10 col-md-6">
								<input 
									type="text" 
									name="price" 
									class="form-control" 
									required="required" 
									placeholder="Price of The Item"
									value="<?php echo $item['Price'] ?>"

									readonly  />
							</div>
						</div>
						<!-- End Price Field -->
							<!-- Start Price Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Available</label>
							<div class="col-sm-10 col-md-6">
								<input 
									type="text" 
									name="available" 
									class="form-control" 
									required="required" 
									placeholder="Price of The Item"
									value="<?php echo $item['Avaible_quantity'] ?>"

                                    readonly

									 />
							</div>
						</div>
						<!-- End Price Field -->
								<!-- Start Price Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label"> solid products Num</label>
							<div class="col-sm-10 col-md-6">
								<input 
									type="text" 
									name="solid" 
									class="form-control" 
									required="required" 
									placeholder="Price of The Item"
									


									 />
							</div>
						</div>
						<!-- End Price Field -->
					
					
						
				
						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" value="Save Item" class="btn btn-primary btn-sm" />
							</div>
						</div>
						<!-- End Submit Field -->
					</form>

		
				</div>

			<?php

			// If There's No Such ID Show Error Message

			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Theres No Such ID</div>';

				redirectHome($theMsg);

				echo "</div>";

			}			

		} elseif ($do == 'Update') {

			echo "<h1 class='text-center'>Update Item</h1>";
			echo "<div class='container'>";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				// Get Variables From The Form

				$id 		= $_POST['itemid'];
				$name 		= $_POST['name'];
				$avilable   = $_POST['available'] ; 
				$desc 		= $_POST['description'];
				$solid	    = $avilable - $_POST['solid'];
				

				// Validate The Form

				$formErrors = array();

				if (empty($name)) {
					$formErrors[] = 'Name Can\'t be <strong>Empty</strong>';
				}

				if (empty($desc)) {
					$formErrors[] = 'Description Can\'t be <strong>Empty</strong>';
				}
				if (empty($solid)) {
					$formErrors[] = 'Country Can\'t be <strong>Empty</strong>';
				}

			
				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					// Update The Database With This Info



					$stmt = $con->prepare("UPDATE 
												medcine 
											SET 
												Name = ?, 
												Description = ?, 
												Avaible_quantity = ?
												
										
											WHERE 
												id = ?");

					$stmt->execute(array($name, $desc, $solid, $id));

					// Echo Success Message

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

					redirectHome($theMsg, 'back');

				}

			} else {

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

			}

			echo "</div>";

		} elseif ($do == 'Delete') {

			echo "<h1 class='text-center'>Delete Item</h1>";
			echo "<div class='container'>";

				// Check If Get Request Item ID Is Numeric & Get The Integer Value Of It

				$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('Item_ID', 'items', $itemid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("DELETE FROM items WHERE Item_ID = :zid");

					$stmt->bindParam(":zid", $itemid);

					$stmt->execute();

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';

					redirectHome($theMsg, 'back');

				} else {

					$theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';

					redirectHome($theMsg);

				}

			echo '</div>';

		} elseif ($do == 'Approve') {

			echo "<h1 class='text-center'>Approve Item</h1>";
			echo "<div class='container'>";

				// Check If Get Request Item ID Is Numeric & Get The Integer Value Of It

				$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('Item_ID', 'items', $itemid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("UPDATE items SET Approve = 1 WHERE Item_ID = ?");

					$stmt->execute(array($itemid));

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

					redirectHome($theMsg, 'back');

				} else {

					$theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';

					redirectHome($theMsg);

				}

			echo '</div>';

		}

		include $tpl . 'footer.php';

	} else {

		header('Location: index.php');

		exit();
	}

	ob_end_flush(); // Release The Output

?>