
<?php

     session_start();
     $nonav = '' ; 
    $company_nav ='' ;
	$pageTitle = 'MR Dashboard';
	     include 'init.php';
    
         $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;

         if($do == 'manage') {
             
             
             
             

         	 $stmt = $con->prepare("SELECT feedback.* ,
             
                                     medcine.Name AS medcine_name ,
                                     
                                     pharmiset.Name AS pharmiset_name ,
                                    
                                     doctor.Name AS doctor_name
                                     
                                     FROM  feedback

                                     INNER JOIN medcine
                                     
                                     ON 
                                     medcine.id = feedback.item_id

                                    INNER JOIN pharmiset
                                    ON
                                    pharmiset.ID = feedback.paharmist_id 
                                    
                                      INNER JOIN doctor
                                    ON
                                    doctor.ID = feedback.doctor_id
                                    
                                    ") ;
        $stmt->execute();

        $rows = $stmt->fetchAll();

        $count = $stmt->rowCount();

      if($count>0) { ?>



     <!--Strat Tabels -->
<div id="page-wrapper">
                <div class="row">
   
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Customers Feedback</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Table of Feedback
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                                             
                                                           <th>ID</th>
                                                           <th>Feedback</th>
                                                           <th>Add_date</th>
                                                           <th>Item_name</th>
                                                           <th>Doctor Feedback</th>
                                                            <th>Pharmiset Feedback</th>

                                                           <th>Control</th>


                                        </thead>
                                        <tbody>
                                            
                            <?php
                                 
                                 
	         	      	     foreach ($rows as $row) {
	         	      	     	                               	
                               	     echo "<tr>";

                               	     echo "<td>".$row['id']."</td>";
                               	     echo "<td>".$row['feed_back']."</td>";
                                     echo "<td>".$row['add_date']."</td>";
                                     echo "<td>".$row['medcine_name']."</td>";
                                     echo "<td>";
                                 
                                  if(isset($row['doctor_name']) && !empty($row['doctor_name']))
                                  {
                                    echo $row['doctor_name'] ;  
                                   }
                                 else{
                                 
                                 echo '--' ; 
                                 }
                                     
                                     echo "</td>";
                                      echo "<td>";
                                 
                                  if(isset($row['pharmiset_name']) && !empty($row['pharmiset_name']))
                                  {
                                    echo $row['pharmiset_name'] ;  
                                   }
                                 else{
                                 
                                 echo '--' ; 
                                 }
                                     
                                     echo "</td>";

                                     echo "<td>";
                                    

                                       echo "<a href='feedback.php?do=Delete&comid=".$row['id']."' class = 'confirm btn btn-danger btn-small'><i                                                class='fa fa-close'></i>Delete</a>";

                                    

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

     
         <?php  }}  elseif( $do == "Delete") {


       

  	        echo "<div class='container'>";

            echo "<h2 class='text-center'>Delete Comments</h2>";
                  
      $comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ?  intval($_GET['comid']) : 0;


      



              $stmt = $connec->prepare("DELETE FROM feedback WHERE id=:id");

              $stmt->bindParam('id',$comid);

              $stmt->execute();
              

               $theMsg = "<div class='alert alert-success'>" .$stmt->rowCount(). " Deleted</div>";
               Redirect($theMsg);
        
              echo "</div>";


    }  

   	   include $tpl.'footer.php';


   
             
