<?php
require('./pdo.php');

$statement = $pdo->prepare("SELECT * FROM `posts` ORDER BY `date` DESC");

$statement->execute();

$post = $statement->fetchAll(PDO::FETCH_ASSOC);

?>