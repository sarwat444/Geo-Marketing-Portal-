<?php
session_start();
$pagetitle = 'index'; 

 $nonav = '' ;
 include 'init.php';
 
$stmt = $con->prepare("SELECT * FROM medcine");
$stmt->execute();
$rows = $stmt->fetchAll(); 

?>
 

  <div class="container">
    
         <h2 class="text-center main-head">Latest Products</h2>

         <div class="row">

          <?php foreach ($rows as  $row) { ?>
            <div class="col-md-3 col-sm-6 col-xs-12">

               <div class="product text-center">
                   <a href="product.php"><img src="<?php echo $row['image']; ?>" class="img-responsive center-block" alt="zaza"></a>
                   <a href="product.php"><h4><?php echo $row['Name'] ?></h4></a>
                   <p class="price"><?php echo "$".$row['Price'] ?></p>
                   <a href="product.php?item_id=<?php echo $row['id'] ?>" class="btn btn-default cart">Detail</a>
               </div>
            </div>

            <?php  } ?>

          






           
         </div>
         
  </div>


<?php 
 include  $tpl.'footer.php';

 ?>