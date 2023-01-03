<?php
require('Usert.php');
require('bdd_connect.php');
session_start();
$errors = [];

if (isset($_POST['btn_inscrire'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $user = new Usert();
    $user->register($login, $password, $email, $firstname, $lastname);
    $errors['register'] = "Vous êtes inscrit !";
} else {
    $errors['register'] = "Vous n'êtes pas inscrit !";
}

if (isset($_POST['isconnect'])) {
    $user = new Usert();
    $user->isConnected();
    $errors['isconnect'] = "Vous êtes connecté !";
} else {
    $errors['isconnect'] = "Vous n'êtes pas connecté !";
}
if (isset($_POST['getallinfos'])) {
    $user = new Usert();
    $user->getallinfos();
    
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
    <article class="container">
        <section>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" name="login" placeholder="login" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" id="" placeholder="password" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="email" name="email" id="" placeholder="email" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="text" name="firstname" id="" placeholder="firstname" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="text" name="lastname" id="" placeholder="lastname" class="form-control">
                </div>
                <input type="submit" value="S'inscrire" name="btn_inscrire" class="btn btn-primary" >
            </form>
            <div style="padding-top: 10px;">
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="submit" name="isconnect" value="isConnected" class="btn btn-outline-dark">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Infos ?" name="getallinfos" class="btn btn-outline-dark">
                    </div>
                </form>
            </div>
            <div class="error">
                <?php foreach($errors as $message):?>
                    <div><?php echo htmlspecialchars($message); ?></div>
                <?php endforeach; ?>
            </div>
        </section>
    </article>
</body>
</html>