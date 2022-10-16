<?php

require('./pdo.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    if ($username && $password){

        $statement = $pdo->prepare("INSERT INTO `users`
            (username, password)
        VALUES
            (:username, :password) 
        ;");

        $statement->bindValue('username', $username, \PDO::PARAM_STR);
        $statement->bindValue('password', $hashedpassword, \PDO::PARAM_STR);

        header("location: login.php");
        
    if (!$statement->execute()) {
            throw new \Exception($statement->errorInfo()[2], 500);
        }
    }
}
?>
