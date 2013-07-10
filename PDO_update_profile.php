<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
		$user_id=$_GET['id'];
		echo 'USER '.$user_id;
		try{
				$data = new PDO('mysql:host=localhost;dbname=registration', 'root', 'webonise6186');
				$query=$data->prepare("update users set fname =?,lname=?,biography=?,addr1=?,addr2=?,landmark=?,city=?,state=?,country=?,pincode=? where id=? ");
				
				if($query->execute(array($_POST['fname'],$_POST['lname'],$_POST['biography'],$_POST['addr1'],$_POST['addr2'],$_POST['landmark'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['pin'],$_POST['uid']))===true)
				{
					echo 'Profile updated successfully <br / >';
					echo '<br><a href=home.php>Home Page</a>';
				}
				else
					echo 'Error';				
				
			}	
			catch(PDOException $e) {
				print "Error : ".$e->getMessege()."<br>";
			}	
	}
?>	
