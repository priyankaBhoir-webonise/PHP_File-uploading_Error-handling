<?php 
	session_start();
	include 'head.php';
	
	if(isset($_SESSION['username']))
	{
		echo '<br><a href=upload_file.php>upload_file</a>';
		echo '<br>hello <b> Admin</b>,<br><br>';
		try{
			$data = new PDO('mysql:host=localhost;dbname=registration', 'root', 'webonise6186');
			
			$stmt=$data->query("select * from users where type='user' ",PDO::FETCH_ASSOC);
			if(isset($stmt)){
			echo '<div >';
			echo '<table border=2>';
			echo '<tr><th>User_id<th>First name<th>Last name<th>Edit<th>delete</tr>';
  				foreach ($stmt as $row) {
  				  	echo'<tr><td>'.$row['id'].'<td>'.$row['fname'].'<td>'.$row['lname'].'<td><a href=http://localhost/assignment_3/edit_user_details.php?id='.$row['id'].'><button type=button>edit</button></a><td><a href=http://localhost/assignment_3/delete_user.php?id='.$row['id'].'><button type=button>delete</button></tr>';
 				}
			echo '</table>';
			echo '</div>';
			}
		}
		catch(PDOException $e) {
			print "Error : ".$e->getMessege()."<br>";
		}
	}
?>
