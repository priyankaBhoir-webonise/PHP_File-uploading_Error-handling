<?php
		session_start();
		if(isset($_SESSION['username'])) {
			
?>
<html>
	<head>
	</head>
	<body>
			<form action="upload_file_check.php" method="post" enctype="multipart/form-data">
			<label for="file">Filename:</label>
			<input type="file" name="upload" id="file"><br>
			<input type="submit" name="submit" value="Submit">
			</form>

	</body>
</html>
<?php
	}
	else
		echo 'Session Expired: <br> please <a href=login.php>Login</a>';
?>
