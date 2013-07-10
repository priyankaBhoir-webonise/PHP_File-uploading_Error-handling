<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
		$user_id=$_GET['id'];
		echo 'USER '.$user_id;
		try{
				$data = new PDO('mysql:host=localhost;dbname=registration', 'root', 'webonise6186');
		
				$query=$data->prepare("delete from users where id = :id ");
				$query->bindParam(':id',$user_id,PDO::PARAM_INT);
				if($query->execute()===true)
				{
					echo 'Profile deleted successfully <br / >';
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
