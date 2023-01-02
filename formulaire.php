<?php

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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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