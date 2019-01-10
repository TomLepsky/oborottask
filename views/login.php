<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<div>
		<?php include(ROOT . '/views/header.php'); ?>

		<form action="#" method="post">
            <p>(for enter you may choose name: tom and email: tom@mail.ru or register new)</p>
            <p>Name </p>
            <input type="text" name="userName" placeholder="enter your name"/>

            <p>email</p>
            <input type="email" name="email" placeholder="enter your email"/>
            
            <br><br>
            
            <input type="submit" name="submit" value="ok">
        </form>
	</div>
  <?php if ($errors) echo $errors; ?> 
	<br>
  <br>
  <div>
        <a href="/">back</a>
  </div>
</body>
</html>