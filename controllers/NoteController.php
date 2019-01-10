<?php

class NoteController {

	public function actionShowNotes() {
		$data = Note::getNotes();

		if (isset($data))
			require_once(ROOT . '/views/index.php');

		return true;
	}

	public function actionShowNote($id) {
		if ($id) {

			$note = Note::getNote($id);
			$user = User::getUserByNote($id);
			require_once(ROOT . '/views/note.php');
		}

		return true;
	}

	public function actionCreateNote() {
		if (User::isGuest()) {
			header("Location: /enter");
		}

		if (isset($_POST['submit'])) {

			$title = $_POST['title'];
			$content = $_POST['content'];

			Note::addNote($_SESSION['user'], $title, $content);
			header('Location: /');

		} 

		require_once(ROOT . '/views/createnote.php');

		return true;
	} //func

	public function actionShowNotesByUser($userId) {
		if ($userId) {
			$userId = intval($userId);

			$notes = Note::getNotesByUser($userId);
			$user = User::getUserById($userId);

			require_once(ROOT . '/views/notelist.php');
		}

		return true;
	}

	public function actionEqualsNotes() {
		$notes = Note::findEqualsTitle();

		require_once(ROOT . '/views/equalnotes.php');
	}

} //class

?>