<?php 
ob_start(); // Output Buffering Start

session_start();

include 'admin/connect.php' ; 

$lat = $_POST['lat'] ; 
$lng = $_POST['lng'] ; 
$id  = $_SESSION['uid'] ;


					$stmt = $con->prepare("UPDATE 
												medical_repersentative 
											SET 
											
												lat = ?,
												lng = ?
												WHERE 
												Mr_ID = ?");

					$stmt->execute(array($lat , $lng, $id));

	

?>