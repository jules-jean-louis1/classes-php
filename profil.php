<?php
session_start();
?>
<?php if (isset($_SESSION['login']) != null ) { ?>
<?php
require('Usert.php');
if (isset($_POST['disconnect'])) {
    $user = new Usert();
    $user->disconnect();
}
if (isset($_POST['suppression'])) {
    $User = new Usert();
    $User->delete();
}
if (isset($_POST['modification'])) {
    $User = new Usert();
    $User->update($_POST['login'],$_POST['password'],$_POST['prenon'],$_POST['nom']);
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profil</title>
</head>
<body>
    <article class="container">
        <section>
            <h1>Profil</h1>
            <p>Bonjour <?php echo $_SESSION['login']; ?></p>
            <p>Voici vos informations:</p>
            <form action="" method="post">
                <div class="mb-3">
                    <p>Login: <?php echo $_SESSION['login']; ?></p>
                    <input type="text" name="login" placeholder="Login">
                </div>
                <div class="mb-3">
                    <p>Password: <?php echo $_SESSION['password'] ?></p>
                    <input type="password" name="password" id="" placeholder="Password">
                </div>
                <div class="mb-3">
                    <p>Prénom: <?php echo $_SESSION['firstname']; ?></p>
                    <input type="text" name="prenon" placeholder="Prénom">
                </div>
                <div class="mb-3">
                    <p>Nom: <?php echo $_SESSION['lastname']; ?></p>
                    <input type="text" name="nom" id="" placeholder="Nom">
                </div>
                <div class="mb-3">
                    <p>Email: <?php echo $_SESSION['email']; ?></p>
                    <input type="email" name="email" id="" placeholder="email">
                </div>
                <input type="submit" value="Déconnexion" name="disconnect" class="btn btn-outline-danger">
                <input type="submit" value="Suppression" name="suppression" class="btn btn-outline-warning">
                <input type="submit" value="Modifier" name="modification" class="btn btn-outline-info">
            </form>
        </section>
    </article>
</body>
</html>
<?php } else { header('Location: index.php');  } ?>