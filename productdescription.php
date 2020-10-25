<?php
session_start();
$pagetitle = 'productreview'; 
 include 'init.php';



$itemid = isset($_GET['item_id']) && is_numeric($_GET['item_id']) ? intval($_GET['item_id']) : 0;

$stmt = $connec->prepare("SELECT * FROM medicin WHERE id=?");
$stmt->execute(array($itemid));
$item = $stmt->fetch(); 



 if(isset($_POST['order'])) {

  if(isset($_SESSION['user'])) {

      $quantity = $_POST['quantity'];
      $memberid = $_SESSION['usedid'];

       if($quantity == 0) {

           $Msg = "<div class='alert alert-danger'>Quantity Cant't be zero</div>";
           Redirect($Msg);

    }  else {
         $stmt5 = $connec->prepare("INSERT INTO orders(quantity,user_id,item_id,order_date)


                                    VALUES(:zquantity,:zuserid,:zitemid,now())");
         $stmt5->execute(array(
          
            'zquantity'  =>  $quantity,
            'zuserid'    =>  $memberid,
            'zitemid'    =>  $item['id']



          ));


             $Msg = "<div class='alert alert-success'>ORDER ADDED SUCCESSFULLY </div>";
            Redirect($Msg);

    }


  }  else {
       
             $Msg = "<div class='alert alert-danger'>You Must Login First </div>";
            Redirect($Msg);
           
  }

 }



  ?>


  <div class="container">
         
         
        <div class="row">
            <div class="product_info">
              <div class="col-md-4 col-xs-12">
                   <img src="layout/images/p3.jpg" class="img-thumbnail img-responsive center-block">
              </div>


              <div class="col-md-5 col-xs-12">

                   <h4><?php echo $item['medicin_name']; ?></h4>
                   <p style="color:#f00;"><?php echo "$".$item['price'] ?></p>
                   <p class="desc"><?php echo $item['description'] ?></p>
                   

                   <form  action="<?php echo $_SERVER['PHP_SELF'].'?item_id='.$item['id']?>" method="POST">
                   <label>Quantity</label>
                   <input type="number" name="quantity" min="0" class="form-control" value="0">
                  
                   <br><br>
                    <input type="submit" class="btn btn-default cart" value='MAKE ORDER' name="order">
              </div>
            </div>
            </div>


  
        <!--End Product Info-->

         <!--Start Product details-->

          <div class="product_details">

              <div class="container">
   
                 <div class="row">

              <div class="col-md-9">
                <div class="panel panel-primary percautions">
                     <div class="panel-heading">

                         <h3 class="panel-title">Panel title</h3>
                         <i class="fa fa-plus pull-right"></i>
                         <div class="clearfix"></div>
                     </div>
                    <div class="panel-body">
                      Panel content
                    </div>
            </div>

            </div>

            </div>

            </div>


        </div>
        
        
         <!--End Product details-->





         <!-- Start Add Feedback -->


          <hr class="custom-hr">

        <?php
          if(isset($_SESSION['user'])) {


                 if(isset($_POST['feedbackadd'])) {
                       
                       $feedback = filter_var($_POST['feedback'],FILTER_SANITIZE_STRING);
                       $itemid = $item['id'];
                       $memberid = $_SESSION['usedid'];

                       if(!empty($feedback)) {

                          $stmt = $connec->prepare("INSERT INTO feedback(feed_back,add_date,item_id,user_id)

                                                    VALUES(:zcomment,now(),:zitemid,:zuserid)");

                          $stmt->execute(array(

                              'zcomment' => $feedback,
                              'zitemid'  => $itemid,
                              'zuserid'  => $memberid
 
                            ));

                          if($stmt) {
                           echo "<div class='alert alert-success'>feedback Added</div>";
                           
                          }

                       }
                       else {
                              
                              echo "<div class='alert alert-danger'>feedback cannot Be Empty</div>";

                       }
                 }

                 ?>
      
        <div class="row">
          <div class="col-md-offset-3">
            <div class="add-feedback">
              <h3>Add Your Feedback</h3>
              <form action="<?php echo $_SERVER['PHP_SELF'].'?item_id='.$item['id']?>"  method="POST">
                 <textarea rows="6" cols="45" name="feedback"></textarea>
                 <input type="submit" class="btn btn-primary" value="Add Feedback" name="feedbackadd">
              </form>
             
            </div>
          </div>
        </div>

        <?php
         } else {
            
            echo "<a href='login.php?item_id=".$item['id'].">Login or Register</a> TO Add Feedback";

         }

        ?>
 
 
  



<?php

  
 include  $tpl.'footer.php';


 



 ?>


