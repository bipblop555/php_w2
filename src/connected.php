<?php
require('./insert_into_post.php');
require('./get_messages.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <h1>
        Welcome 
        <strong>
            <?php echo $actualUserN ?>
        </strong>
    </h1>
    <div class="form_container">
        <form action="" method="POST">
            <textarea name="post_content" id="post_content">

            </textarea>
            <input type="submit" name="submit">
        </form>
    </div>
    <?php foreach($post as $posts): ?>
        <h2><?=$posts["post_user"]?></h2>
        <div class="messages">
            <p>
                <?= $posts["post_content"] ?>
            </p>
            <p class="date">
                <?= $posts["date"] ?>
            </p>
        </div>

        <a href="delete.php?id=<?=$posts['id']?>">Supprimer </a>
        <a href="modify.php?id=<?=$posts['id']?>">Modifier </a>

    <?php endforeach; ?>
</body>
</html>