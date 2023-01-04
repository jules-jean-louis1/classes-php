<?php
require_once('./classes/Userpdo.php');
session_start();

if (isset($_POST['deconnexion'])) {
    $user = new Userpdo();
    $user->disconnect();
}
if (isset($_POST['suppression'])) {
    $user = new Userpdo();
    $user->delete();
    header ('Location: form_connexion.php');
}
if (isset($_POST['update'])) {
    $user = new Userpdo();
    $user->update($_POST['login'], $_POST['password'], $_POST['email'], $_POST['prenom'], $_POST['nom']);
    header ('Location: form_connexion.php');
}
?>
<DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PDO - Profil</title>
</head>
<body>
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
    <main>
        <article>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1>Profil</h1>
                        </div>
                    </div>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="login">Login : <?php echo $_SESSION['login']; ?></label>
                            <input type="text" name="login" id="login" class="form-control" value="<?php echo $_SESSION['login']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Mot de passe : <?php echo $_SESSION['password']; ?></label>
                            <input type="password" name="password" id="password" class="form-control" value="<?php echo $_SESSION['password']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email"> Email : <?php echo $_SESSION['email']; ?> </label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom">Prénom : <?php echo $_SESSION['firstname']; ?></label>
                            <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $_SESSION['firstname']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom">Nom : <?php echo $_SESSION['lastname']; ?></label>
                            <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $_SESSION['lastname']; ?>" required>
                        </div>
                        <div>
                            <input type="submit" name="update" value="Modifier" class="btn btn-info">
                            <input type="submit" name="suppression" value="Supprimer le compte" class="btn btn-danger">
                        </div>
                    </form>
                </div>
            </section>
        </article>
    </main>
</body>
</html>