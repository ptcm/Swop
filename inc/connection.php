<?php
	
	try {$dsn = 'mysql:host=localhost;dbname=swop_match';
			$username = 'root';
			$password = ''; 

			$db = new PDO($dsn, $username, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
	}catch (Exception $e){
			echo 'Unable to connect';
			echo BR;
			echo $e->getMessage();
			exit;
	}
	
?> 