<?php

require_once('bdd_connect.php');


if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $user_check = "SELECT login FROM utilisateurs WHERE login = '$login'; ";
    $check = mysqli_query($connect, $user_check);
    $request = mysqli_query($connect, "INSERT INTO utilisateurs SET login='$login', password='$password', email='$email', firstname='$firstname', lastname='$lastname'");
    
    if (mysqli_num_rows($check) > 0) {
        echo "Ce login est déjà utilisé";
    } else {
        if ($request) {
            echo "Inscription réussie";
        } else {
            echo "Erreur";
        }
    }
} else {
    # code...
}

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<header>
    <?php include('header.php'); ?>
</header>
<body>
    <article>
        <section class="container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="login" class="control-label col-sm-2">Login</label>
                    <input type="text" name="login" id="login" required>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label col-sm-2">Mot de passe</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-2">E-mail</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="firstname" class="control-label col-sm-2">Prénom</label>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
                <div class="form-group">
                    <label for="lastname" class="control-label col-sm-2">Nom</label>
                    <input type="text" name="lastname" id="lastname" required>
                </div>
                <input type="submit" class="btn btn-outline-success" value="Inscription" name="submit">
            </form>
        </section>
    </article>
</body>
</html>