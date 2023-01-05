<?php
session_start();
require_once './classes/Userpdo.php'; ?>
<?php if (isset($_SESSION['login']) != null) {?>
<?php
$message = array();
$getinfos = array();

$user = new Userpdo();
$message = $user->getALLInfos();
$info = ['Login', 'Password', 'Email', 'Prénom', 'Nom'];


if (isset($_POST['getlogin'])) {
    $user = new Userpdo();
    $getinfos = $user->getLogin();
}
if (isset($_POST['getemail'])) {
    $user = new Userpdo();
    $getinfos = $user->getEmail();
}
if (isset($_POST['getfname'])) {
    $user = new Userpdo();
    $getinfos = $user->getFirstname();
}
if (isset($_POST['getlname'])) {
    $user = new Userpdo();
    $getinfos = $user->getLastname();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Infos - PDO</title>
</head>
<body>
    <!-- <header>-->
    <?php include ('header.php'); ?>
    <!-- <header>-->
        <main class="container" style="padding-top: 200px;">
            <div class="d-flex justify-content-center align-items-center text-center">
                <div class="flex-lg-column">
                    <div class="">
                        <div class="flex-lg-column">
                            <div class="mb-auto p-2">
                                <h1 class="text-uppercase font-weight-bold">Infos</h1>
                            </div>
                        </div>
                        <div class="flex-lg-column">
                            <div class="col-12">
                                <p>Voici les infos de l'utilisateur</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <?php
                                for ($i = 0; $i < count($info); $i++) {
                                    foreach ($info as $infos) {
                                            foreach ($message as $infos => $msg) {
                                            ?>
                                        <li class="list-group-item"> <?php echo $infos . ' : ' . $msg; ?></li>
                                        <?php } break;
                                    } break;
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center" style="padding-top: 10px;">
                <div class="row">
                    <form action="" method="post">
                        <input type="submit" value="Getlogin" name="getlogin" class="btn btn-outline-primary">
                        <input type="submit" value="Getemail" name="getemail" class="btn btn-outline-primary">
                        <input type="submit" value="Getfirstname" name="getfname" class="btn btn-outline-primary">
                        <input type="submit" value="Getlastname" name="getlname" class="btn btn-outline-primary">
                        <div class="mb-3">
                                <?php foreach ($getinfos as $getinfo) : ?>
                                    <p><?php echo $getinfo; ?></p>
                                <?php endforeach; ?>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    <!-- <footer>-->
    <?php include ('footer.php'); ?>
    <!-- <footer>-->
</body>
</html>
<?php } else {
    header('Location: index.php');
} ?>