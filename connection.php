<?php 
		$mysqlObj =  mysql_connect('127.0.0.1' , 'root' , 'webonise6186');

		//echo 'In the Process-------';
       		if(!$mysqlObj) {    
		   	 die('[' . mysql_errorno() . ']Could not connect to the DB : ' .mysql_error());   
	    	}
		
?>
