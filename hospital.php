

<?php

    /*
    ======================================================
    == Medcine for Destripuation  By Medical Representative
    ======================================================
    */

    ob_start(); // Output Buffering Start

    session_start();

    $pageTitle = 'Items';

    if (isset($_SESSION['user'])) {

        include 'init.php';
        

        $child = $_POST['child'] ;

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        $mr_id = $_SESSION['uid'] ; 

        if ($do == 'Manage') {

            $stmt = $con->prepare("SELECT * FROM hospital WHERE ID = '$child' ");

            // Execute The Statement

            $stmt->execute();

            // Assign To Variable 

            $items = $stmt->fetchAll();

            if (! empty($items)) {

            ?>



<!--Strat Tabels -->
<div id="page-wrapper">
                <div class="row">
   
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">All Hospital</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Table Descripe All Hospital
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>                     
                                               	<th>#ID</th>
                                                <th>Hospital Name</th>
                                                <th>Control</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
                                            
                            <?php
                            foreach($items as $item) {
                                echo "<tr>";
                                    echo "<td>" . $item['ID'] . "</td>";
                                    echo "<td>" . $item['Name'] . "</td>";
                                    echo "<td>
                                        <a href='pharmacy_way.php?lat=".$item['lat']."&lng=" . $item['lng'] . "
                                        ' class='btn btn-success'><i class='fa fa-map-marker fa-lg'></i>Show The Way</a>
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
                            <div class="panel-footer">
                                 <a href="items.php?do=Add" class="btn btn-sm btn-primary">
					<i class="fa fa-plus"></i> New New Product
				</a>
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

            $stmt = $con->prepare("SELECT * FROM pharmacy WHERE ID = '$child' ");

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

                $id         = $_POST['itemid'];
                $name       = $_POST['name'];
                $avilable   = $_POST['available'] ; 
                $desc       = $_POST['description'];
                $solid      = $avilable - $_POST['solid'];
                

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