<?php

session_start();

require_once('./classes/Userpdo.php');

$valid = 0;
$errors = [];
$message = [];
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
            $errors[] = "Bonjour" . " " . $_SESSION['login'];
            $message = $user->connect($login, $password);
        } else {
            $errors[] = "Mtp ou login incorrect";
        }
    }
}

if (isset($_POST['deconnexion'])) {
    $user = new Userpdo();
    $user->disconnect();
    $message = $user->disconnect();
}

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
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="" class="nav-link active"></a>
                </li>
                <li>
                    <a href="" class="nav-link active"></a>
                </li>
                <li>
                    <?php if (isset($_SESSION['login']) != null) { ?>
                        <a href="form_profil.php" class="btn btn-warning"><?php echo $_SESSION['login']; ?></a>
                    <?php } else { ?>
                        <a href="form_connexion.php" class="btn btn-warning">Profil</a>
                    <?php } ?>
                </li>
            </ul>
            <form action="" method="post" class="d-flex">
                <?php if (isset($_SESSION['login']) != null) { ?>
                    <input type="submit" name="deconnexion" value="Se déconnecter"  class="btn btn-danger">
                <?php } else { ?>
                <input type="submit" name="login" value="Connexion"  class="btn btn-success">
                <?php } ?>
            </form>
        </div>
    </nav>
</header>
<body>
    <article style="padding-top:150px;">
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
                    <?php
                        foreach ($message as $value) { ?>
                        <li><?php echo htmlspecialchars($value); ?></li>
                    <?php    } ?>
                    </ul>
                </div>
            </form>
        </section>
    </article>
        <!-- <footer>-->
        <?php include ('footer.php'); ?>
    <!-- <footer>-->
</body>
</html>