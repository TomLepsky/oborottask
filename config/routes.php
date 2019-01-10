<?php

return array(
			"note/([\d]+)" => "note/showNote/$1",
			"notes/([\d]+)" => "note/showNotesByUser/$1",
			"createnote" => "note/createNote",
			"seeauthors" => "user/showUsers",
			"equalnotes" => "note/equalsNotes",
			"register" => "user/register",
			"enter" => "user/enter",
			"exit" => "user/exit",
			"" => "note/showNotes"
  			);

?>