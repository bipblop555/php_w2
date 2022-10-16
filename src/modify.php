<?php
require('./pdo.php');

session_start();

if (isset($_POST['update'])){

    if(isset($_POST['post_content'])){

    }
    $post_content = $_POST['post_content'];
    $id = $_GET['id'];

    $statement = $pdo->prepare("UPDATE 
                                    `posts`
                                SET
                                    post_content = ?
                                WHERE 
                                    id = ?");

    $statement->execute(array($post_content));
    
    
    http_response_code(302);

    header('location: connected.php');
    exit();
    
    // if (!$statement->execute()) {
    //     throw new \Exception($statement->errorInfo()[2], 500);
    // }

}

?>