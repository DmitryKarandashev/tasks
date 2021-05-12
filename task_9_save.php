<?php
$pdo = new PDO("mysql:host=localhost; dbname=tasks", "mysql", "mysql");
$sql = "INSERT INTO my_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute($_POST);

header("Location: /task_9.php");
