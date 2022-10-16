<?php

require('./pdo.php');

session_start();
// $_SESSION['username'] = $username;
$actualUser = $_SESSION["userid"];
$actualUserN = $_SESSION["useruid"];

var_dump($actualUser);


if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $post_content = filter_input(INPUT_POST, 'post_content');

    $statement = $pdo->prepare("UPDATE `posts` 
        SET
            (post_content, post_id)
        WHERE
            (id = $actualUser)
        ;");

    $statement->bindValue('post_content', $post_content, \PDO::PARAM_STR);

    var_dump( $_SESSION["userid"], $post_content);

}



?>
