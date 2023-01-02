<?php

// Path: bdd_connect.php
$connect = mysqli_connect('localost', 'root', '', 'classes');

// ajout de la connexion à la base de données pour plesk


mysqli_set_charset($connect, 'utf8');
?>