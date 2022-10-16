<?php
require('./pdo.php');
session_start();

if (isset($_GET['id'])){
    
    $statement = $pdo->prepare("DELETE FROM 
                                    `posts`
                                WHERE 
                                    id = ?");
    
    $statement->execute(array($_GET['id']));
    
    http_response_code(302);
    header('location: connected.php');
    exit();
    
    if (!$statement->execute()) {
        throw new \Exception($statement->errorInfo()[2], 500);
    }
}

?>