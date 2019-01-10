<!DOCTYPE html>
<html>
<head>
	<title>note list</title>
</head>
<body>
	<?php include(ROOT . '/views/header.php'); ?>
	<div>
		<p>Notes by <?php echo $user['name'];?></p>
	</div>
	<div>
		<?php foreach($notes as $note): ?>
			<br>
			<div>
				<p>Title: <?php echo $note['title']; ?></p>
				<p><a href="/note/<?php echo $note['id']?>">Read note</a></p>
				<br>
				<hr>
			</div>
			<br>
		<?php endforeach; ?>
	</div>
	<div>
		<a href="/">back</a>
	</div>
</body>
</html>