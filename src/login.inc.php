<?php
require('./pdo.php');
// Vérifie que l'username n'est pas deja utiliser
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $statement = $pdo->prepare("SELECT * FROM `users` WHERE username = ?;");
    $statement->execute([$username]);
    $uidExist = $statement->fetch(PDO::FETCH_ASSOC);

    if ($uidExist) {
        $_SESSION["userid"] = $uidExist['id'];
        $_SESSION["useruid"] = $uidExist['username'];

       /*  echo'<script>windows.location.href="./connected.php"</script>'; */
        header("location: connected.php");
        exit();
    } else {
        return false;
    }
   
} 

?>