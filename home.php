<?php 
	function error_login() {
		echo '<h3 style="color:red">Invalid username or Invalid password </h3> <br><a href=login.php>back</a>';
	}
	function home_page($line){
		
		include 'head.php';
		echo '<br><br> Hello <b> '.$line['fname'].' '.$line['lname'].',</b> <br />';
		echo '<a href=http://localhost/assignment_3/changepwd.php>change password</a><br>';
		echo '<a href=http://localhost/assignment_3/edit_profile.php>Edit profile</a>';	
	}
	session_start();
	
	//echo 'done';
	if(isset($_POST['submit']))	{
		$uname=$_POST['uname'];
		$pwd=$_POST['pwd'];
		
				
				include 'connection.php';
				mysql_select_db('registration') or die(mysql_error());
			
				$query="select fname,lname,password,type from users where email_id='".$_POST['uname']."' ";
				$result=mysql_query($query);
				$line = mysql_fetch_array($result, MYSQL_ASSOC);
				if($line['password']==$pwd )
				{
					// home page
					$_SESSION['username'] = $_POST['uname'];
					if($line['type']==admin)
							header("Location: home_admin.php");
					else
							home_page($line);	
					
				}
				else
					error_login();
		
	}
	else if(isset($_SESSION))
	{
			
			include 'connection.php';
			mysql_select_db('registration') or die(mysql_error());
			$query="select fname,lname,password,type from users where email_id='".$_SESSION['username']."' ";
			$result=mysql_query($query);
			
			$line = mysql_fetch_array($result, MYSQL_ASSOC);
			if($line['type']==admin)
							header("Location: home_admin.php");
					else
							home_page($line);	
		
	}
	
?>
