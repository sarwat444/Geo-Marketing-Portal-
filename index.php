<?php
	ob_start();
	session_start();
	$pageTitle = 'Login';
    $nonav = '' ;
	if (isset($_SESSION['user'])) {
		header('Location: mr_dashboard.php');
	}
	include 'init.php';

	// Check If User Coming From HTTP Post Request

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (isset($_POST['login'])) {

			$user = $_POST['username'];
			$pass = $_POST['password'];
			

			// Check If The User Exist In Database

			$stmt = $con->prepare("SELECT 
										Mr_ID, Name, password 
									FROM 
										medical_repersentative 
									WHERE 
										Name = ? 
									AND 
										password = ?");

			$stmt->execute(array($user, $pass));

			$get = $stmt->fetch();

			$count = $stmt->rowCount();

			// If Count > 0 This Mean The Database Contain Record About This Username

			if ($count > 0) {

				$_SESSION['user'] = $user; // Register Session Name

				$_SESSION['uid'] = $get['Mr_ID']; // Register User ID in Session

				header('Location: mr_dashboard.php'); // Redirect To Dashboard Page

				exit();

		} 


	}
}

?>




<div class="container login-page">
	
	<!-- Start Login Form -->
	<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		    <div class="container">
	<div class="login-container">
            <div id="output"></div>
            <div class="avatar">
                <img src="layout/img/avatar6.png">
        </div>
            <div class="form-box">
              
                    <input 

				type="text" 
				name="username" 
				autocomplete="off"
				placeholder="Type your username" 
				required />
                   	<input 
			
				type="password" 
				name="password" 
				autocomplete="new-password"
				placeholder="Type your password" 
				required />
			<input class="btn btn-primary mybtn" type="submit" name="login" value="login" >
                    
               
            </div>
        </div>
        
</div>
	</form>
    

    
	<!-- End Login Form -->
	
    
    
    
	<div class="the-errors text-center">
		<?php 

			if (!empty($formErrors)) {

				foreach ($formErrors as $error) {

					echo '<div class="msg error">' . $error . '</div>';

				}

			}

			if (isset($succesMsg)) {

				echo '<div class="msg success">' . $succesMsg . '</div>';

			}

		?>
	</div>
</div>

<?php 
	include $tpl . 'footer.php';
	ob_end_flush();
?>