<?php
	function db_connect(){
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'oasishot_ota';
		// $user = 'oasishot_ota';
		// $pass = '#Pass@12345#';
		// $db = 'oasishot_ota';
		
		$db_connect = mysqli_connect($host,$user,$pass,$db);
			return $db_connect;
	}
	
?>