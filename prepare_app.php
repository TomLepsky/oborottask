<?php

$dbname = "oborot_task";

$root = "root";
$rootPass = "";

$user = "qwertyUser";
$userPass = "000000";
$host = "localhost";

try {
	$pdo = new PDO("mysql:host=" . $host, $root, $rootPass);

	$pdo->exec("create database if not exists " . $dbname);
	$pdo->exec("create user '{$user}'@'localhost' identified by '{$userPass}';");
	$pdo->exec("grant all privileges on oborot_task . * to '{$user}'@'localhost';");

	$pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $userPass);

	$pdo->exec("create table if not exists users(
					id int(10) AUTO_INCREMENT PRIMARY KEY,
					name varchar(255) NOT NULL,
					email varchar(255) NOT NULL
				)Engine=InnoDB DEFAULT CHARSET=utf8;");

	$pdo->exec("create table if not exists notes(
					id int(10) AUTO_INCREMENT PRIMARY KEY,
					title TEXT NOT NULL,
					content TEXT NOT NULL,
					date_create TEXT NOT NULL
				)Engine=InnoDB DEFAULT CHARSET=utf8;");

	$pdo->exec("create table if not exists bridge(
					author_id int(10) NOT NULL,
					note_id int(10) NOT NULL
				)Engine=InnoDB DEFAULT CHARSET=utf8;");


} catch (PDOException $e) {
	echo "DB error: " . $e->getMessage();
	exit();
}

?>