<?php
ob_start(); // Output Buffering Start

	session_start();

	$pageTitle = 'Items';
            
     ?>
   <div class="container">
     <div class="row">
	        <div class="col-md-4">
	          <div class="side">
               
                 
	          </div>
	        </div>
	        <div class="col-md-8 col-md-offset-8">

	        </div>
	   </div>
    </div>
   





    <?php 

		include $tpl . 'footer.php';

	ob_end_flush(); // Release The Output

?>