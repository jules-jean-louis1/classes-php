<?php

// Path: bdd_connect.php
$connect = mysqli_connect('localhost', 'root', '', 'classes');

// ajout de la connexion à la base de données pour plesk

//$connect = mysqli_connect('localhost', 'jjl-classes', 'wAr6r6$81', 'jules-jean-louis_classes');

mysqli_set_charset($connect, 'utf8');
?>