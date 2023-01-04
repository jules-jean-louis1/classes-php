<?php
require_once('./classes/Userpdo.php');

if (isset($_POST['btn_inscrire'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $user = new Userpdo();
    $user->register($login, $password, $email, $firstname, $lastname);
}

if (isset($_POST['connect'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $user = new Userpdo();
    $user->connect($login, $password);
}

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Formulaire PDO</title>
</head>
<body>
<!-- <header>-->
<?php include ('header.php'); ?>
<!-- <header>-->
    <article style="padding-top: 200px;">
        <section class="container">
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
                <div class="mb-3">
                    <input type="submit" name="btn_inscrire" value="S'inscrire" class="btn btn-primary">
                </div>
            </form>
        </section>
    </article>
    <!-- <footer>-->
    <?php include ('footer.php'); ?>
    <!-- <footer>-->
</body>
</html>