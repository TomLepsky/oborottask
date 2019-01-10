<!DOCTYPE html>
<html>
<head>
	<title>notes</title>
</head>
<body>
	<?php include(ROOT . '/views/header.php'); ?>
	<?php foreach($data as $row):?>
	<div>
		<h2><?php echo $row['notes.title']; ?></h2>
		<h3>published by <?php echo $row['users.name']; ?>, at <?php echo $row['notes.date_create']; ?></h3>
	</div>
	<div>
		<p>
			<a href="/note/<?php echo $row['notes.id']; ?>">See more...</a>
		</p>
	</div>
	<hr>
	<?php endforeach;?>
</body>
</html>