<?php

// Path: bdd_connect.php
$connect = mysqli_connect('localhost', 'root', '', 'classes');

// ajout de la connexion à la base de données pour plesk


mysqli_set_charset($connect, 'utf8');
?>