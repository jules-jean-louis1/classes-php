<?php

session_start();

require_once('./classes/Userpdo.php');

$valid = 0;
$errors = [];

if (isset($_POST['connect'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $valid = 1;
    if (empty($login)) {
        $errors[] = "Veuillez renseigner un login";
        $valid = 0;
    }
    if (empty($password)) {
        $errors[] = "Veuillez renseigner un mot de passe";
        $valid = 0;
    }
    if ($valid == 1) {
        $user = new Userpdo();
        $user->connect($login, $password);
        if ($user) {
            $errors[] = "Vous êtes connecté";
            $errors[] = "Bonjour" . " " . $_SESSION['login'];
        } else {
            $errors[] = "Mtp ou login incorrect";
        }
    }
}
/* $pdo = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
$sql = "SELECT * FROM utilisateurs WHERE login = 'toto' AND password = 'toto'";
$query = $pdo->query($sql);
$user = $query->fetchall(PDO::FETCH_ASSOC);
var_dump($user); */


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PDO connexion</title>
</head>
<body>
    <article>
        <section class="container">
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" name="login" placeholder="login" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" id="" placeholder="password" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="connect" value="Se connecter" class="btn btn-primary">
                </div>
                <div class="mb-3">
                    <ul>
                    <?php
                    if (isset($errors)) {
                        foreach ($errors as $error) { ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php    }
                    }
                    ?>
                    </ul>
                </div>
            </form>
        </section>
    </article>
</body>
</html>