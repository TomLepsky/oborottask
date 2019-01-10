<?php

class Note {

	public static function addNote($userId, $title, $content) {
		$db = DB::getConnection();

		$currentDate = date("H:i d.F.Y", time());
		$query = "insert into notes (title, content, date_create) values (:title, :content, :date_create)";


		$result = $db->prepare($query);
		$result->bindValue(':title', $title);
		$result->bindValue(':content', $content);
		$result->bindValue(':date_create', $currentDate);
		$result->execute();
		$noteId = $db->lastInsertId();

		$db->query("insert into bridge (author_id, note_id) values ($userId, $noteId)");
	}

	public static function getNote($noteId) {
		if ($noteId) {
			$db = DB::getConnection();

			$noteId = intval($noteId);

			$result = $db->query("select * from notes where id = {$noteId}");
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	public static function getNotes() {
		$db = DB::getConnection();

		$result = $db->query("select users.id as users_id, users.name as users_name, users.email as users_email, notes.id as notes_id, notes.title as notes_title, 
									notes.content as notes_content, notes.date_create as notes_date_create from users 
									inner join bridge on users.id = author_id 
									inner join notes on notes.id = note_id order by date_create desc");

		$notes = array();
		foreach ($result as $note) {
			$notes[] = array(
							'users.id' => $note['users_id'],
							'users.name' => $note['users_name'],
							'users.email' => $note['users_email'],
							'notes.id' => $note['notes_id'],
							'notes.title' => $note['notes_title'],
							'notes.content' => $note['notes_content'],
							'notes.date_create' => $note['notes_date_create'],
							);
		}

		return $notes;
	}

	public static function getNotesByUser($userId) {
		if ($userId) {
			$userId = intval($userId);

			$db = DB::getConnection();

			$result = $db->query("select * from users inner join bridge on users.id = author_id 
													  inner join notes on note_id = notes.id where users.id = $userId
													  order by date_create asc");

			$notes = array();
			foreach ($result as $note) {
			$notes[] = array(
							'id' => $note['id'],
							'title' => $note['title'],
							'content' => $note['content'],
							'date_create' => $note['date_create']
							);
			}

			return $notes;
		} //if
	}

	public static function findEqualsTitle() {
		$db = DB::getConnection();

		$result = $db->query("select * from notes a, notes b where a.title = b.title and a.id <> b.id");

		$notes = array();
		foreach ($result as $note) {
		$notes[] = array(
						'id' => $note['id'],
						'title' => $note['title'],
						'content' => $note['content'],
						'date_create' => $note['date_create']
						);
		}

		return $notes;
	}


}

?>