<?php
require('Usert.php');
require('bdd_connect.php');
session_start();
if (isset($_POST['btn_inscrire'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $user = new Usert();
    $user->register($login, $password, $email, $firstname, $lastname);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Classes</title>
</head>
<header>
    <?php include('header.php'); ?>
</header>
<body>
    <form action="" method="post">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password" id="" placeholder="password">
        <input type="email" name="email" id="" placeholder="email">
        <input type="text" name="firstname" id="" placeholder="firstname">
        <input type="text" name="lastname" id="" placeholder="lastname">
        <input type="submit" value="S'inscrire" name="btn_inscrire">
    </form>
</body>
</html>