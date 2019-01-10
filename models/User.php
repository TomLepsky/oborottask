<?php

class User {

	public static function isUserExist($userName, $email) {
		$db = DB::getConnection();

		$query = "select count(*) from users where email = :email AND name = :username";
		$result = $db->prepare($query);
		$result->bindValue(':username', $userName);
		$result->bindValue(':email', $email);
		$result->execute();

		if ($result->fetchColumn())
			return true;

		return false;

	}

	public static function checkName($name) {
		if (strlen($name) > 1)
			return true;
		return false;
	}

	public static function isCorrectEmail($email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
			return true;

		return false;
	}

	public static function addUser($userName, $email) {
		$db = DB::getConnection();

		$query = "insert into users (name, email) values (:username, :email);";
		$result = $db->prepare($query);
		$result->bindValue(':username', $userName, PDO::PARAM_STR);
		$result->bindValue(':email', $email, PDO::PARAM_STR);
		$result->execute();

		return $db->lastInsertId();
	}

	public static function getUsers() {
		$db = DB::getConnection();

		$result = $db->query("select * from users order by name asc");

		$users = array();
		foreach ($result as $row) {
			$users[] = array(
							'id' => $row['id'],
							'name' => $row['name'],
							'email' => $row['email']
							);
		}

		return $users;
	}

	public static function getUserByNote($noteId) {
		if ($noteId) {
			$db = DB::getConnection();

			$noteId = intval($noteId);

			$query = "select users.id, users.name, users.email from users inner join bridge on users.id = author_id 
										  inner join notes on notes.id = note_id 
										  where note_id = {$noteId}";
			$result = $db->query($query);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	public static function getUserIdByEmail($email) {
		$db = DB::getConnection();

		$result = $db->prepare("select id from users where email = :email");
		$result->bindValue(':email', $email);
		$result->execute();
		
		return $result->fetch(PDO::FETCH_NUM);
	}

	public static function getUserById($userId) {
		$db = DB::getConnection();

		$result = $db->prepare("select * from users where id = :id");
		$result->bindValue(':id', $userId);
		$result->execute();
		$result->setFetchMode(PDO::FETCH_ASSOC);

		return $result->fetch();
	}

	public static function isGuest() {
		if (isset($_SESSION['user']))
			return false;
		
		return true;
	}

	public static function register($name, $email) {
		
		$db = DB::getConnection();
		
		$sql = "insert into users (name, email) VALUES (:name, :email)";
		
		$result = $db->prepare($sql);
		$result->bindValue(':name', $name);
		$result->bindValue(':email', $email);
		
		$result->execute();
		
		return $result;
		
	}

	public static function auth($userId) {
		
		$_SESSION['user'] = $userId;
		
	}

	public static function goOut() {
		if (isset($_SESSION['user']))
			unset($_SESSION['user']);
	} 
}

?>