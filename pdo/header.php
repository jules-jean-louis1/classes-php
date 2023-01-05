    
    
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link active">Acceuil class</a>
                    </li>
                    <li>
                        <a href="index.php" class="nav-link active">Acceuil PDO</a>
                    </li>
                    <li>
                        <?php if (isset($_SESSION['login']) != null) { ?>
                            <a href="form_profil.php" class="btn btn-warning"><?php echo $_SESSION['login']; ?></a>
                            <a href="getinfos.php" class="btn btn-outline-warning">Voir les Infos</a>
                        <?php } else { ?>
                            <a href="form_connexion.php" class="btn btn-warning">Profil</a>
                        <?php } ?>
                    </li>
                </ul>
                <form action="" method="post" class="d-flex">
                    <?php if (isset($_SESSION['login']) != null) { ?>
                        <input type="submit" name="deconnexion" value="Se déconnecter"  class="btn btn-danger">
                    <?php } else { ?>
                    <a href="form_connexion.php" class="btn btn-success">Connexion</a>
                    <?php } ?>
                </form>
            </div>
        </nav>
    </header>