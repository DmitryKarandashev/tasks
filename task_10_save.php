<?php
session_start();

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost; dbname=tasks", "mysql", "mysql");

$sql = "SELECT * FROM my_table WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$record = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($record)) {
    $message = "This record is already exists";
    $_SESSION['danger'] = $message;

    header("Location: /task_10.php");
    exit();
}

$sql = "INSERT INTO my_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

$message = "Record added successfully";
$_SESSION['success'] = $message;

header("Location: /task_10.php");



