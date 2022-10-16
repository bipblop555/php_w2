<?php
session_start();
$id_session = session_id();
$_SESSION['username'] = $username;

if (isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username !='' && $password!=''){
        header("Location: connected.php");
    }
}

?>