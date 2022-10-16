<?php

require('./pdo.php');

session_start();
// $_SESSION['username'] = $username;
$actualUser = $_SESSION["userid"];
$actualUserN = $_SESSION["useruid"];

date_default_timezone_set('UTC');
$messageDate = date("Y-m-d H:i:s");



var_dump($actualUser, $messageDate);


if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $post_content = filter_input(INPUT_POST, 'post_content');
    $post_id = $actualUser;
    $post_user = $actualUserN;

    $statement = $pdo->prepare("INSERT INTO `posts`
            (post_content, post_id, date, post_user)
        VALUE
            (:post_content, :post_id, :date, :post_user)
        ;");

    $statement->bindValue('post_content', $post_content, \PDO::PARAM_STR);
    $statement->bindValue('post_id', $post_id, \PDO::PARAM_STR);
    $statement->bindValue('post_user', $post_user, \PDO::PARAM_STR);
    $statement->bindValue('date', $messageDate, \PDO::PARAM_STR);


    var_dump( $_SESSION["userid"], $post_content);

    if (!$statement->execute()) {
        throw new \Exception($statement->errorInfo()[2], 500);
    }

}



?>
