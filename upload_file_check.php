<?php
		
		session_start();
		
		function my_error_handler($errno,$errmsg,$errfile,$errline)				// user defined function for error handling
		{
			switch($errno){
			case E_USER_ERROR :
								echo "ERROR : [$errno] : $errmsg";
								die();
								break;
			case E_USER_NOTICE :
								echo "ERROR : [$errno] : $errmsg";
								break;
			 default :
								echo "ERROR : [unknown error type] : $errmsg";
								break;
			}
				
		}	
	
		function upload_file(){
		
			$allowed_types=array('image/jpeg','image/jpg','image/png','application/pdf','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',' application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			if(isset($_POST['submit']))
			{
				if(($_FILES['upload']['error']<=0) and (in_array($_FILES['upload']['type'],$allowed_types)))
					{			
					
							$tmp = $_FILES['upload']['tmp_name'];
      							$dst = "/var/www/assignment_5/{$_FILES['upload']['name']}";
     						 	if (move_uploaded_file($tmp, $dst)) {
       								 // Success !
								echo '<pre>';
								print_r($_FILES);
								echo '</pre>';
								echo '<br>File is uploaded successfully. you can find the file at '.$dst;
     							}	
					}
					else
					{
							if($_FILES['upload']['error']==4){
									trigger_error('No file was uploaded',E_USER_NOTICE);				// using user defined trigger
									echo '<br />please upload the file :<a href=upload_file.php> back</a>';
							}
							else  if (!in_array($_FILES['upload']['type'],$allowed_types)){
									throw new Exception(" : not specified type");		//using exception
															
							}
							else if($_FILES['upload']['error']==1)
									trigger_error(' The uploaded file exceeds the max_filesize ',E_USER_NOTICE);		// using user defined trigger
							else if($_FILES['upload']['error']==2)
									trigger_error(' The uploaded file exceeds the MAX_FILE_SIZE ',E_USER_NOTICE);		// using user defined trigger
							else if($_FILES['upload']['error']==3)
									trigger_error(' File was partially uploaded ',E_USER_ERROR);		// using user defined trigger
						
					}
			
					$tmp = $_FILES['upload']['tmp_name'];
 					 if (file_exists($tmp) && is_file($tmp))
   							 unlink($tmp); 	
	
			}
			else
				die('Error : Nothing was submitted');									// using die for handling error
																				//It will be needed when link is directly loaded rather than being redirected from upload_file.php
		}	
		$old_error_handler = set_error_handler("my_error_handler");						// adding error_handling function to error handler

		if(isset($_SESSION['username'])) {
			try{
				upload_file();
			}
			catch(Exception $e)
			{
					echo 'Exception : '.$e->getMessage();
			}
		}
?>

