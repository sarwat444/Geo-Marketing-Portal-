<?php

           session_start();
     $nonav = '' ; 
    $company_nav ='' ;
	$pageTitle = 'MR Dashboard';
	     include 'init.php';
    
         $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;

         if($do == 'manage') {

         	 $stmt = $con->prepare('SELECT * FROM medcine');
         	 $stmt->execute();

         	 $rows = $stmt->fetchAll();

             $count = $stmt->rowCount();

             if($count>0) { ?>

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
                                                             
                                                       <th>ID</th>
                                                       <th>Image</th>
                                                       <th>Name</th>
                                                       <th>Expiry</th>
                                                       <th>Price</th>
                                                      <th>Available_Quantity</th>
                                                      <th>Solid</th>
                                                      <th>Control</th>


                                        </thead>
                                        <tbody>
                                            
                            <?php
                                 
                                 
	         	      	     foreach ($rows as $row) {
	         	      	     	 echo "<tr>";
                                       
                                       echo "<td>".$row['id']."</td>";

                                       echo "<td><img src='uploads/medicin_images/".$row['image']."' alt='zaza' class='img-responsive center-block'></td>";
                               
                              
                                       echo "<td>".$row['Name']."</td>";
                                       echo "<td>".$row['Expiry']."</td>";
                                       echo "<td>".$row['Price']."</td>";
                                       echo "<td>".$row['Avaible_quantity']."</td>";
                                       echo "<td>".$row['Solid']."</td>";
                            
                                      echo "<td>";

                                      echo "<a href='items.php?do=Edit&itemid=".$row['id']."' 

                                           class='btn btn-success'><i class='fa fa-edit'></i>Edit</a>";

                                       echo "  <a href= 'items.php?do=Delete&itemid=".$row['id']."' 

                                           class='btn btn-danger confirm'><i class='fa fa-close'></i>Delete</a>";

                                         
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

     
         <?php  }}  
             
                elseif($do=='Add') {?>
                 
                 <h2 class="text-center">Add New Medicin</h2>
                 <div class="container">

                     <form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">

                         <div class="form-group">

                            <label class="control-label col-sm-2"> Name </label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="name" class="form-control" required="required" />
                            </div>
                         </div>

                         <div class="form-group">

                            <label class="control-label col-sm-2"> Description </label>
                            <div class="col-md-6 col-sm-10">
                               <textarea class="form-control" name="description" rows="6" required>
                                 
                               </textarea>
                            </div>
                         </div>

                          <div class="form-group">

                            <label class="control-label col-sm-2"> Percautions </label>
                            <div class="col-md-6 col-sm-10">
                               <textarea class="form-control" name="percautions" rows="6" required="">
                                   
                               </textarea>
                            </div>
                         </div>

                         <div class="form-group">

                            <label class="control-label col-sm-2"> Price </label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="price" class="form-control" required="required"/>
                            </div>
                         </div>

                          <div class="form-group">

                            <label class="control-label col-sm-2"> Pharmacy Price </label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="fprice" class="form-control" required="required"/>
                            </div>
                         </div>

                          <div class="form-group">

                            <label class="control-label col-sm-2">Doctor Price </label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="dprice" class="form-control" required="required"/>
                            </div>
                         </div>


                          <div class="form-group">

                            <label class="control-label col-sm-2">Hospital Price </label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="hprice" class="form-control" required="required"/>
                            </div>
                         </div>

                         <div class="form-group">

                            <label class="control-label col-sm-2">Kitnes</label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="kitnes" class="form-control" required="required"/>
                            </div>
                         </div>

                         <div class="form-group">

                            <label class="control-label col-sm-2">Category</label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="category" class="form-control" required="required"/>
                            </div>
                         </div>

                          <div class="form-group">
                             <label class="col-sm-2 control-label">Image</label>
                             <div class="col-md-6 col-sm-10">

                              <input class='form-control ' type="file" name="image" required="required">  

                             </div>
                          </div>

                  
                          <div class="form-group">

                              <div class="col-sm-offset-2 col-md-6">
                                <input type="submit" value="Add Medicin" class="form-control btn btn-success">
                              </div>
                          </div>


                     </form>
                     </div>



     <?php    } elseif ($do == 'Insert') {
     	

     	                echo '<h1 class="text-center">Insert Medicin</h1>';
     	                echo "<div class='container'>";

                        if($_SERVER['REQUEST_METHOD'] == 'POST') {

                        	$name = $_POST['name'];
                        	$desc = $_POST['description'];
                          $cautions = $_POST['percautions'];
                        	$price = $_POST['price'];
                          $pharmacy_price = $_POST['fprice'];
                          $doctor_price = $_POST['dprice'];
                          $hospital_price = $_POST['hprice'];
                          $cat   = $_POST['category'];
                          $kitnes   = $_POST['kitnes'];
                           $image_name = $_FILES['image']['name'];
                           $image_size = $_FILES['image']['size'];
                           $image_type = $_FILES['image']['type'];
                           $image_tmp = $_FILES['image']['tmp_name'];

               $image_extensions = array('jpeg','jpg','gif','png');

               $extension = strtolower(end(explode('.',$image_name)));
                         
                        	$formerrors = array();


                           if(empty($name)) {

                           	   $formerrors[] = "The Name Cant Be Empty";
                           }

                           if(empty($desc)) {

                           	   $formerrors[] = "The Desciption Cant Be Empty";
                           }

                            if(empty($cautions)) {

                               $formerrors[] = "The cautions Cant Be Empty";
                           }
                           if(empty($price)) {

                           	   $formerrors[] = "The Price Cant Be Empty";
                           }
                        

                            if(empty($pharmacy_price)) {

                               $formerrors[] = "The phamrmacy Price Cant Be Empty";
                           }

                            if(empty($doctor_price)) {

                               $formerrors[] = "The doctor Price Cant Be Empty";
                           }

                            if(empty($hospital_price)) {

                               $formerrors[] = "The hospital Price Cant Be Empty";
                           }


                            if(empty($cat)) {

                               $formerrors[] = "The category Cant Be Empty";
                           }

                            if(empty($kitnes)) {

                               $formerrors[] = "The kitnes  Cant Be Empty";
                           }



                          


                            if(!empty($image_name) && !in_array($extension, $image_extensions)) {

                              $formerrors[] = ' This Extension Is Not Allowed ';
                            }

                      if(empty($image_name)) {

                          $formerrors[] = ' This image Is Required ';
                      }
                      
                      if($image_size > 4194304) {

                            $formerrors[] = ' This image cannot Be More Than 4MB ';
                      }


                            foreach($formerrors as $error) {
                                      
                                 echo "<div class='alert alert-danger'>".$error."</div>";


                            }

 
                           if(empty($formerrors)) {

                                  $image = rand(0,1000000000).'_'.$image_name;

                              move_uploaded_file($image_tmp, "uploads\medicin_images\\".$image);

                            $check = checkItem('medicin_name','medicin',$name);
                            
                            if($check == 1) {

                            echo 'sorry this user name exist ';
                         
                          }

                    
                       else {


                       $stmt = $connec->prepare("INSERT INTO medicin(medicin_name,price,pharmacy_price,hospital_price,doctor_price,add_date,category,image,kitnes,description,precautions)

                                  VALUES(:zname,:zprice,:zfprice,:zhprice,:zdprice,now(),:zcat,:zimage,:zkitnes,:zdesc,:zcaution)
                                  ");

                                 $stmt->execute(array(

                                     'zname'          =>$name,
                                     'zprice'         =>$price,
                                     'zfprice'        =>$pharmacy_price,
                                     'zhprice'        =>$hospital_price,
                                     'zdprice'        =>$doctor_price,
                                     'zcat'           =>$cat,
                                     'zimage'         =>$image,
                                     'zkitnes'        =>$kitnes,
                                     'zdesc'          =>$desc,
                                     'zcaution'       =>$cautions
     
                                       

                                 	));

                               $theMsg = "<div class='alert alert-success'>". $stmt->rowCount() ." Record Insertd</div>";

                              Redirect($theMsg); 

                           }
                            
                     

                   }

                 }




                      
                        



                        else {

                        	$theMsg = "<div class='alert alert-danger'> You Cant Browse This Page Directly </div>";

                            Redirect($theMsg);
                        }


                     echo "</div>";

         

         } elseif ($do == 'Edit') { 

           $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0 ;

           
               $stmt = $connec->prepare("SELECT *FROM medicin where id=?");

               $stmt->execute(array($itemid));
   
                $row = $stmt->fetch();

              ?>

               <h2 class="text-center">Edit Items</h2>
             
               <div class="container">

                <form class="form-horizontal" action="?do=Update" method="POST" enctype="multipart/form-data">
               	 

               	<input type="hidden" name="id" value="<?php echo $row['id']?>" />

                     
                      <div class="form-group">

                            <label class="control-label col-sm-2"> Name </label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="name" class="form-control" required="required"  value="<?php echo $row['medicin_name']?>"/>
                            </div>
                         </div>

                         <div class="form-group">

                            <label class="control-label col-sm-2"> Description </label>
                            <div class="col-md-6 col-sm-10">
                               <textarea class="form-control" name="description" rows="6" required>
                                     <?php echo $row['description']?>
                               </textarea>
                            </div>
                         </div>

                          <div class="form-group">

                            <label class="control-label col-sm-2"> Percautions </label>
                            <div class="col-md-6 col-sm-10">
                               <textarea class="form-control" name="percautions" rows="6" required="">
                                    <?php echo $row['precautions']?>
                               </textarea>
                            </div>
                         </div>

                         <div class="form-group">

                            <label class="control-label col-sm-2"> Price </label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="price" class="form-control" required="required"/ value="<?php echo $row['price']?>">
                            </div>
                         </div>

                          <div class="form-group">

                            <label class="control-label col-sm-2"> Pharmacy Price </label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="fprice" class="form-control" required="required"/ value="<?php echo $row['pharmacy_price']?>">
                            </div>
                         </div>

                          <div class="form-group">

                            <label class="control-label col-sm-2">Doctor Price </label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="dprice" class="form-control" required="required"/ value="<?php echo $row['doctor_price']?>">
                            </div>
                         </div>


                          <div class="form-group">

                            <label class="control-label col-sm-2">Hospital Price </label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="hprice" class="form-control" required="required"/ value="<?php echo $row['hospital_price']?>">
                            </div>
                         </div>

                         <div class="form-group">

                            <label class="control-label col-sm-2">Kitnes</label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="kitnes" class="form-control" required="required"/ value="<?php echo $row['kitnes']?>">
                            </div>
                         </div>

                         <div class="form-group">

                            <label class="control-label col-sm-2">Category</label>
                            <div class="col-md-6 col-sm-10">
                               <input type="text" name="category" class="form-control" required="required"/ value="<?php echo $row['category']?>">
                            </div>
                         </div>

                          <div class="form-group">
                             <label class="col-sm-2 control-label">Image</label>
                             <div class="col-md-6 col-sm-10">

                              <input class='form-control ' type="file" name="image" required="required" value="<?php echo $row['image']?>">  


                             </div>
                          </div>


                

                          <div class="form-group">

                              <div class="col-sm-offset-2 col-md-6">
                                <input type="submit" value="Update Item" class="form-control btn btn-primary">
                              </div>
                          </div>


                   </form>





                
         	

       <?php  }  elseif($do == "Update") {




             if($_SERVER['REQUEST_METHOD'] == 'POST') {

             	echo "<div class='container'>";
                   
                       $id = $_POST['id'];
                       $name = $_POST['name'];
                          $desc = $_POST['description'];
                          $cautions = $_POST['percautions'];
                          $price = $_POST['price'];
                          $pharmacy_price = $_POST['fprice'];
                          $doctor_price = $_POST['dprice'];
                          $hospital_price = $_POST['hprice'];
                          $cat   = $_POST['category'];
                          $kitnes   = $_POST['kitnes'];
                          $image_name = $_FILES['image']['name'];
                           $image_size = $_FILES['image']['size'];
                           $image_type = $_FILES['image']['type'];
                           $image_tmp = $_FILES['image']['tmp_name'];

               $image_extensions = array('jpeg','jpg','gif','png');

               $extension = strtolower(end(explode('.',$image_name)));
                         
                          $formerrors = array();


                           if(empty($name)) {

                               $formerrors[] = "The Name Cant Be Empty";
                           }

                           if(empty($desc)) {

                               $formerrors[] = "The Desciption Cant Be Empty";
                           }

                            if(empty($cautions)) {

                               $formerrors[] = "The cautions Cant Be Empty";
                           }
                           if(empty($price)) {

                               $formerrors[] = "The Price Cant Be Empty";
                           }
                        

                            if(empty($pharmacy_price)) {

                               $formerrors[] = "The phamrmacy Price Cant Be Empty";
                           }

                            if(empty($doctor_price)) {

                               $formerrors[] = "The doctor Price Cant Be Empty";
                           }

                            if(empty($hospital_price)) {

                               $formerrors[] = "The hospital Price Cant Be Empty";
                           }


                            if(empty($cat)) {

                               $formerrors[] = "The category Cant Be Empty";
                           }

                            if(empty($kitnes)) {

                               $formerrors[] = "The kitnes  Cant Be Empty";
                           }



                          


                            if(!empty($image_name) && !in_array($extension, $image_extensions)) {

                              $formerrors[] = ' This Extension Is Not Allowed ';
                            }

                      if(empty($image_name)) {

                          $formerrors[] = ' This image Is Required ';
                      }
                      
                      if($image_size > 4194304) {

                            $formerrors[] = ' This image cannot Be More Than 4MB ';
                      }




                            foreach($formerrors as $error) {
                                      
                                 echo "<div class='alert alert-danger'>".$error."</div>";


                            }

                            if(empty($formerrors)) {

                                 
                                   $image = rand(0,1000000000).'_'.$image_name;

                                 move_uploaded_file($image_tmp, "uploads\medicin_images\\".$image);

                                 $check = checkItem('id','medicin',$id);


                                 if($check >0) {

                                     $stmt = $connec->prepare("UPDATE medicin set medicin_name =?, description = ? ,price = ?,pharmacy_price=?,doctor_price=?,hospital_price=?,image = ?,precautions= ?, category =? WHERE id = ?");

                                   $stmt->execute(array($name,$desc,$price,$pharmacy_price,$doctor_price,$hospital_price,$image,$cautions,$cat,$id));

                                   $theMsg = "<div class='alert alert-success'>". $stmt->rowCount()." Updated </div>";

                                 	Redirect($theMsg);
                                 
                                 }

                                 else {

                                 	$theMsg = "<div class='alert alert-danger'> The Item Is Not Exist </div>";

                                 	Redirect($theMsg);
                                 }

                                 echo "</div>";


                            }


///////////////////////////////
             } else {

             	$theMsg = "<div class='alert alert-danger'> The Item Is Not Exist </div>";

                  Redirect($theMsg);
             }

///////////////////////////////////////////////////
       }  elseif($do == 'Delete') {

       	      echo "<h1 class='text-center'>Delete Items</h1>";

       	      echo "<div class='container'>";

               $itemid  = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0 ;

               $check = checkItem('id','medicin',$itemid);

               if($check > 0 ) {

               	    $stmt = $connec->prepare("DELETE FROM medicin WHERE id=:zid");

               	    $stmt->bindParam("zid",$itemid);

               	    $stmt->execute();

               	   $theMsg ="<div class='alert alert-success'>".$stmt->rowCount()." Record Deleted</div>";
                    Redirect($theMsg,'back');

               }

               else {

                    $theMsg ="<div class='alert alert-danger'> This Item Not Found </div>";
                    Redirect($theMsg,'back');
               }

               echo "</div>";

       }    

                                           /////////////////////////////////////////////////////////
 
		   



		 include $tpl.'footer.php';

    ?>
                   