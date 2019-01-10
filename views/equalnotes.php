<!DOCTYPE html>
<html>
<head>
	<title>equal notes</title>
</head>
<body>
<?php include(ROOT . '/views/header.php'); ?>
	<div>
		<?php foreach($notes as $note): ?>
			<br>
			<div>
				<p>Id: <?php echo $note['id']; ?></p>
				<p>Date create: <?php echo $note['date_create']; ?></p>
				<p>Title: <?php echo $note['title']; ?></p>
				<p>Content: <?php echo $note['content']; ?></p>
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