<?php
	ob_start();
	session_start();
	$pageTitle = 'Company Dashbord';
	include 'init.php'; 

	?>
     <!--Start Company Dashbord --> 
     <div class="col-md-8">
         <div class="dashborad-content">
            <h5>Dashboard contents </h5>
            
         </div>
     </div>

     <!--End Company Dashbord --> 



    <?php
       


include $tpl . 'footer.php';
	ob_end_flush();

	?>