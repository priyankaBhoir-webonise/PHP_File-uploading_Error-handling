<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
		include 'head.php';
		$user_id=$_GET['id'];
		try{
			$data = new PDO('mysql:host=localhost;dbname=registration', 'root', 'webonise6186');
		
			$query=$data->prepare("select * from users where id = :id ");
			$query->bindParam(':id',$user_id,PDO::PARAM_INT);
			$query->execute();
			$line = $query->fetch(PDO::FETCH_ASSOC);
			echo '<form action="PDO_update_profile.php" method ="post">';
			echo '<table border=1>';
			echo '<tr hidden><td>User id : <td><input type="text" name="uid" id="uid" value='.$line['id'].' hidden><br><br>';
			echo '<tr><td>First name : <td><input type="text" name="fname" id="fname" value='.$line['fname'].'><br><br>';
			echo '<tr><td>Last name : <td><input type="text" name="lname" id="lname"  value='.$line['lname'].'><br><br>';
			echo '<tr><td>Biography:	  <td><input type="textarea" name="biography" value='.$line['biography'].'><br><br>';
			echo '<tr><td colspan=2>Address:';
						echo '<table>';
						echo '<tr><td>address1:<td><input type="text" name="addr1" value='.$line['addr1'].'> ';
						echo '<tr><td>address2:<td><input type="text" name="addr2" value='.$line['addr2'].'> '; 
						echo '<tr><td>landmark :<td><input type="text" name="landmark"  value='.$line['landmark'].'>'; 
						echo '<tr><td>city:<td><input type="text" name="city" value='.$line['city'].' >'; 
						echo '<tr><td>state:<td><input type="text" name="state" value='.$line['state'].'>';
						echo '<tr><td>country:<td><input type="text" name="country" value='.$line['country'].'>';
						echo '<tr><td>pin:<td><input type="text" name="pin" value='.$line['pincode'].'>';  
						echo '</table>';
			echo '<tr><td colspan=2 align=center><input type="submit" name="submit" value="submit">';
			echo '</table>';
			echo '</form>';
			
		}
		catch(PDOException $e) {
			print "Error : ".$e->getMessege()."<br>";
		}	
	}
?>
