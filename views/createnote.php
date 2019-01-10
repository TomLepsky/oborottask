<!DOCTYPE html>
<html>
<head>
	<title>create note</title>
</head>
<body>
      <?php include(ROOT . '/views/header.php'); ?>
	<div>
		<form action="#" method="post">

            <p>title</p>
            <input type="text" name="title" placeholder="enter title of note"/>

            <p>note</p>
            <textarea name="content" placeholder="" cols="60" rows="10"></textarea>
            
            <br><br>
            
            <input type="submit" name="submit" value="publish">
        </form>
	</div>
      <br>
      <br>
      <div>
            <a href="/">back</a>
      </div>
</body>
</html>