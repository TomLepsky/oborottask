<?php

class DB {
	
	public static function getConnection() {
		$params = include(ROOT . '/config/db_params.php');
		
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		try {
			$db = new PDO($dsn, $params['user'], $params['password']);
			
		} catch (PDOException $e) {
			echo "DB error: " . $e->getMessage();
			exit();
		}
		return $db;
		
	}
	
}

?>