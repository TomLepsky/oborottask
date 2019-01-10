<?php

/**
 * 
 */
class UserController {
	
	public function actionShowUsers() {
		$users = User::getUsers();

		require_once(ROOT . '/views/userlist.php');
		
		return true;
	}

	public function actionEnter() {
		$errors = false;

		if (isset($_POST['submit'])) {

			$userName = $_POST['userName'];
			$email = $_POST['email'];

			if (User::isUserExist($userName, $email)) {
				$user = User::getUserIdByEmail($email);
				User::auth($user[0]);
				header("Location: /");
			} else {
				$errors = "wrong email or name";
			}
		}

		require_once(ROOT . '/views/login.php');

		return true;
	}

	public function actionRegister() {
		$errors = false;

		if (isset($_POST['submit'])) {

			$userName = $_POST['userName'];
			$email = $_POST['email'];
			
			if (User::checkName($userName) && User::isCorrectEmail($email)) {
				if (!User::isUserExist($userName, $email)) {
					User::register($userName, $email);

					$user = User::getUserIdByEmail($email);
					User::auth($user[0]);

					header("Location: /");
				} else {
					$errors = "this user already exists";
				}
				
			} 
		}

		require_once(ROOT . '/views/login.php');

		return true;
	}

	public function actionExit() {
		User::goOut();

		header('Location: /');
	}
}

?>