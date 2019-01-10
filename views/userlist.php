<!DOCTYPE html>
<html>
<head>
	<title>user list </title>
</head>
<body>
	<?php include(ROOT . '/views/header.php'); ?>
	<div>
		<?php foreach($users as $user): ?>
			<br>
			<div>
				<p>Name: <?php echo $user['name']; ?></p>
				<p>Email: <?php echo $user['email']; ?> </p>
				<p><a href="/notes/<?php echo $user['id']?>">See all his notes</a></p>
				<br>
				<hr>
			</div>
			<br>
		<?php endforeach; ?>
	</div>
</body>
</html>