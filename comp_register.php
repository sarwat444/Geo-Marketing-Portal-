<?php
	ob_start();
	session_start();
	$pageTitle = 'Login';
    $nonav = '' ;
	if (isset($_SESSION['comp'])) {
		header('Location: company_search.php');
	}
	include 'init.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
		    $formErrors = array();

			$username 	= $_POST['UserName'];
            $email      = $_POST['Email'];
			$password 	= $_POST['password'];
            $telphone   = $_POST['telphone'] ;
			$password2  = $_POST['RPassword'];
 
    
			if (isset($username)) {

				$filterdUser = filter_var($username, FILTER_SANITIZE_STRING);

				if (strlen($filterdUser) < 4) {

					$formErrors[] = 'Username Must Be Larger Than 4 Characters';

				}

			}

			if (isset($password) && isset($password2)) {

				if (empty($password)) {

					$formErrors[] = 'Sorry Password Cant Be Empty';

				}

				if (sha1($password) !== sha1($password2)) {

					$formErrors[] = 'Sorry Password Is Not Match';

				}

			}

			if (isset($email)) {

				$filterdEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

				if (filter_var($filterdEmail, FILTER_VALIDATE_EMAIL) != true) {

					$formErrors[] = 'This Email Is Not Valid';

				}

			}

			// Check If There's No Error Proceed The User Add
        
        
  
 
			if (empty($formErrors)) {

				// Check If User Exist in Database

				$check = checkItem("Name", "compay", $username);

				if ($check == 1) {

					$formErrors[] = 'Sorry This User Is Exists';

				} else {

					// Insert Userinfo In Database

					$stmt = $con->prepare("INSERT INTO 
											compay(Name, Passoword, Email , Telphone , Image , RegStatus, Date)
										    VALUES(:zuser, :zpass, :zmail , :zphone,'' , 0, now())");
					$stmt->execute(array(

						'zuser'    => $username,
						'zpass'    => sha1($password),
						'zmail'    => $email ,
                        'zphone'   =>  $telphone 
					

					));

					// Echo Success Message

					$succesMsg = 'Congrats You Are Now Registerd User';
                    header('location:comp_login.php') ;

				}

			}
          

		

	}
?>


<div class="container login-page">
	<div class="login-container register-container">
        <div class="avatar img-circle img-responsive">
                <img src="layout/img/avatar6.png">
            </div>
            <div class="form-box">
              <form class="login" action="" method="POST">
                   	
                  <input type="text" name="UserName" autocomplete="off" placeholder="Type your username" required />
                  <input type="Email" name="Email" autocomplete="off" placeholder="Type your Email" required />
                  <input type="password" name="password" autocomplete="new-password" placeholder="Type your password" required />
                  <input type="password" name="RPassword" autocomplete="new-password" placeholder="Repeate your password" required/>
                  <input type="text" name="telphone" autocomplete="new-password" placeholder="Enter Your Phone plez" required/>
<!--                    <button class="btn btn-info" type="submit"><i class="fa fa-sign-in fa-large"></i>Register Now</button>-->
                  <input class="btn btn-primary mybtn" type="submit" name="register" value="Register Now" >
               </form>
            </div>
        </div>
</div>


<?php 
	include $tpl . 'footer.php';
	ob_end_flush();
?>