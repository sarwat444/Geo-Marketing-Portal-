
<?php
     ob_start(); // Output Buffering Start

	session_start();

	$pageTitle = 'MR Profile';

    include 'init.php';     

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
		
<!--Start Profile Page -->
<div class="container">
    <div id="page-wrapper">
                <div class="row">
    <div class="col-md-4">
     <div class="main-info">
     
         
         <div class="side">
            <img class="" src="layout/img/man-team.jpg"  alt="mohamed"/>  
             <table class="table-bordered table-responsive" >
                <tr><td><span>Name:</span></td><td><p>Mohamed sarwat mohamed abdelhamid ebraim SDSADAS</p> </td></tr>    
                <tr><td><span>Address:</span></td><td><p>Meetbara-quesna-Elmonofy sdsadasdas s</p>  </td></tr>  
                <tr><td><span>Phone:</span></td><td><p>(+48)2545708</p></td></tr>  
                <tr><td><span>Email:</span></td><td><p>msarwat46@gmail.com </p></td></tr> 
             </table>    
        </div>  
         
     </div>
       </div>
                    
                
            </div>
     </div>
</div>





<!--End Profile Page -->
 <?php

  include $tpl . 'footer.php';
  ob_end_flush();   
     
?>