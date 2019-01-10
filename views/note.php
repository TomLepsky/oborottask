<!DOCTYPE html>
<html>
<head>
	<title>note #<?php echo $note['id']; ?></title>
</head>
<body>
	<?php include(ROOT . '/views/header.php'); ?>
	<div>
		<h2><?php echo $note['title']; ?></h2>
		<h3>published by <?php echo $user['name']; ?>, at <?php echo $note['date_create']; ?></h3>
	</div>
	<div>
		<p>
			<?php echo $note['content']; ?>
		</p>
	</div>
	<div>
		<a href="/">back</a>
	</div>

</body>
</html>