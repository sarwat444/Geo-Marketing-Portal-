<?php
  ob_start();
  session_start();
  $pageTitle = 'Company Dashbord';
  include 'init.php';
   $parent = ((isset($_POST['parent']) && !empty($_POST['parent']))?sanitize($_POST['parent']) : '');
  ?>
    
        <!--Find Departments -->
        <?php
        $stmt = $con->prepare("SELECT * FROM departments");

        // Execute The Statement

        $stmt->execute();

        // Assign To Variable

        $rows = $stmt->fetchAll(); ?>

          <!-- End Find Departments -->
        

        <form method="post" action="pharmacy.php">
          
          <label >Select Convernrate </label>
         <select class="form-control search"  name="parent" id="parent">
              <option value=""<?php echo (($parent == '')?' selected' : ''); ?>>..........</option>
                 <?php foreach($rows as $row) { ?>
              
            
                <option value="<?php echo  $row['id']; ?>"<?php echo (($parent == $row['id'])?' selected' : ''); ?>><?php echo  $row['name']; ?></option>
            
                   <?php   }  ?>
                  
         </select>

            <label >Select Country</label>
         <select class="form-control search"  name="child" id="child"></select>

   

    <input type="submit" class="btn btn-primary"value="Show Results">


        </form>


<?php
include $tpl . 'footer.php';
  ob_end_flush();

  ?>
