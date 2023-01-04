<?php
if (isset($_POST['disconnect'])) {
    $user = new Usert();
    $user->disconnect();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profil.php">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Link</a>
        </li>
      </ul>
      <div class="d-flex">
            <form>
                <?php if (isset($_SESSION['login'])) { ?>
                    <form action="" method="post">
                        <input type="submit" value="Déconnexion" name="disconnect" class="btn btn-outline-danger">
                      </form>
                      <a href="profil.php" class="btn btn-outline-success"><?php echo htmlspecialchars($_SESSION['login']); ?></a>
                <?php } else { ?>
                <a href="form-connect.php" class="btn btn-outline-success" type="submit">Connexion</a>
                <?php } ?>
            </form>
      </div>
    </div>
  </div>
</nav>